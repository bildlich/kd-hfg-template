<?php
class Tx_sdjhfgkd20_ViewHelpers_MediaViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $mdata  Object Property
	 */	
	
	public function render($mdata){
		// echo "<pre>".htmlentities(print_r($mdata,true))."</pre>";
		
		
		
		
		$i=0;
		
		$data=array();
		foreach($mdata as $m){
			//Bild
			if(strlen($m->image)>0){
				$data[$i]["type"]="image";
				$data[$i]["media"]="uploads/tx_sdjhfgkd20/".$m->image;
				$data[$i]["alt"]=$m->title;
				$size=getimagesize($data[$i]["media"]);
				$data[$i]["w"]=$size[0];
				$data[$i]["h"]=$size[1];
			}
			//Video
			elseif(strlen($m->mp4)>0 && strlen($m->ogg)>0){				
				$data[$i]["type"]="video";
				$data[$i]["media"]="uploads/tx_sdjhfgkd20/".$m->mp4;
				$data[$i]["media2"]="uploads/tx_sdjhfgkd20/".$m->ogg;	
				
				//MP4-Info Class
				include("typo3conf/ext/sdjhfgkd20/Resources/Private/Frameworks/MP4Info.php");
				$info=MP4Info::getInfo($data[$i]["media"]);
				$data[$i]["w"]=$info->video->width;
				$data[$i]["h"]=$info->video->height;
								
			}
			//Embed
			elseif(strlen($m->embed)>0){				
				//http://vimeo.com/82090537
				$type="embed2";
				$em=explode("vimeo.com/",$m->embed);
				if(count($em)==1){
					//http://www.youtube.com/watch?v=vqRWMDv0r78
					$type="embed";
					$em=explode("youtube.com/watch?v=",$m->embed);
					if(count($em)==1){
						//http://youtu.be/vqRWMDv0r78
						$type="embed";
						$em=explode("youtu.be/",$m->embed);
					}
				}
				
				if(count($em)>0){
					$data[$i]["type"]=$type;
					$data[$i]["media"]=$em[count($em)-1];
					
					//YT
					if($type=="embed"){
						 $xml=simplexml_load_file('http://youtube.com/oembed?url=http://youtu.be/'.$data[$i]["media"].'&format=xml');
						 $w=$xml->width;
						 $h=$xml->height;
					}
					//Vimeo
					else{
						$xml=simplexml_load_file('http://vimeo.com/api/v2/video/'.$data[$i]["media"].'.xml');
						$w=$xml->video->width;
						$h=$xml->video->height;
					}
					
					$data[$i]["w"]=800;
					$data[$i]["h"]=480;
					if(isset($h) && isset($w))
						$data[$i]["w"]=round($w/($h/480),0);
			
				}else{
					continue;
				}
			}
			$i++;
		}
				
		return $data;
	}
}
?> 