<?php
	// no direct access
	defined('_JEXEC') or die('Restricted access');
	
	// get an XML parser
	$parser = JFactory::getXMLParser('Simple');
	
	// parse XML string
	$xml = '<?xml version="1.0" ?>
					<catalog name="Box Office Music">
						<album>
								<title>Moving Pictures</title>
								<artist>Rush</artist>
								<year>1981</year>
								<tracks>
									<track length="4:33">Tom Sawyer</track>
									<track length="6:06">Red Barchetta</track>
									<track length="4:24">YYZ</track>
									<track length="4:19">Limelight</track>
									<track length="10:56">The Camera Eye</track>
									<track length="4:43">Witch Hunt</track>
									<track length="4:43">Vital Signs</track>
								</tracks>
						</album>
						<album>
								<title>Georgia Wonder 2006</title>
								<artist>Georgia Wonder</artist>
								<year>2006</year>
								<tracks>
									<track length="5:18">Genius</track>
									<track length="6:26">Two Weeks To Live</track>
									<track length="3:40">Falling Down</track>
									<track length="6:36">Hello Stranger</track>
									<track length="4:06">Carnival</track>
								</tracks>
						</album>
						<single>
							<title>Some Single</title>
						</single>
					</catalog>';
					
	$parser->loadString($xml);
	
// get the parsed XML document
$xmldoc =& $parser->document;
	
	// add a new album to the document
	$newAlbum =& $xmldoc->addChild('album');
	$title =& $newAlbum->addChild('title');
	$title->setData('Green Onoins');
	$artist =& $newAlbum->addChild('artist');
	$artist->setData('Booker T. &amp; The MG\'s');
	$year =& $newAlbum->addChild('year');
	$year->setData('1962');
	
	// add tracks to the new album
	$tracks =& $newAlbum->addChild('tracks');
	$track =& $tracks->addChild('track', array('length' => '2.45'));
	$track->setData('Green Onions');
	$track =& $tracks->addChild('track', array('length' => '2.39'));
	$track->setData('Rinky Dink');
	
	// get the catalog name
	$catalog = $xmldoc->attributes('name');
	echo '<h3 class="componentheading">'.$catalog.'</h3>';
	
	// get the album elements
	$albums =& $xmldoc->album;
	
	// output the albums
	echo '<h2>Albums</h2>';
	for ($i = 0, $c = count($albums); $i < $c; $i ++ )
	{
			// get the album
			$album =& $albums[$i];
	
			echo '<div class="album">';
			if ($name =& $album->getElementByPath('title'))
			{
					// display title
					echo '<strong>'.$name->data().'</strong><br/>';
			}
			if ($artist =& $album->getElementByPath('artist'))
			{
					// display the artist
					echo '<em>'.$artist->data().'</em>';
			}
			if ($year =& $album->getElementByPath('year'))
			{
					// display the year of release
					echo ' ('.$year->data().')';
			}
			
			if ($tracks =& $album->getElementByPath('tracks'))
			{
					// get the track listing
					$listing =& $tracks->track;
	
					// output listing table
					echo '<table><tr><th>Track</th><th>Length</th></tr>';
					for ($ti = 0, $tc = count($listing); $ti < $tc; $ti ++)
					{
						// output an individual track
						$track =& $listing[$ti];
						echo '<tr>';
						echo '<td>'.$track->data().'</td>';
						echo '<td>'.$track->attributes('length').'</td>';
						echo '</tr>';
					}
					echo '</table>';
			}
			
			echo '</div>';
	}
	
	// add CSS to the document
	$document =& JFactory::getDocument();
	$document->addStyleDeclaration('.album {border: 1px solid #999; margin: 20px; padding: 5px; width: 250px;}
																	.album table{width: 100%; margin-top: 10px;}
																	.album strong{font-size: 18px;}' );