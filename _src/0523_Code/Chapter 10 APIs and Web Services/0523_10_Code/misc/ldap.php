<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

// import the LDAP client
jimport('joomla.client.ldap');

// prepare LDAP parameters
$params = new JParameter("host=127.0.0.1\nport=389\nuse_ldapV3=1\nnegotiate_tls=0\nno_referrals=1\nbase_dn=dc=example, dc=org\nusers_dn=cn=[username],dc=example,dc=org\nsearch_string=");

// get client
$client = new JLDAP($params);

// connect to the LDAP server
if (!$client->connect())
{
    JError::raiseError('SOME_ERROR', JText::_('LDAP connection failed'));
}

// bind with the server
if (!$client->bind('Manager', 'secret', false))
{
    JError::raiseError('SOME_ERROR', JText::_('LDAP bind failed'));
}

// search for Person objects
$results = $client->search(array('(objectClass=Person)'), 'ou=people,dc=example,dc=org');

// output the Person object
echo '<div class="ldap">';
for ($i = 0, $c = count($results); $i < $c; $i ++)
{
    $result =& $results[$i];
    echo '<div>';
    echo '<strong>'.$result['givenName'][0].'</strong><br />';
    echo $result['description'][0].'<br />';
    echo '<em>'.$result['telephoneNumber'][0].'</em>';
    echo '</div>';
}
echo '</div>';

// add CSS to the document
$doc =& JFactory::getDocument();
$doc->addStyleDeclaration('.ldap div {
    background-color: #FFFFF0;
    margin: 20px;
    padding: 5px;
    width: 700px;
    list-style: upper-roman;
}

.ldap strong
{
    font-size: 18px;
}');

?>