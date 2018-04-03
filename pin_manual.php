<?php
error_reporting(0);
$blog = 'https://blogcaliweura.blogspot.com'; //Tanpa garis miring di ahir
$mid = $_GET['m'];
$sub = $_GET['s'];
$fb= $_GET['fb'];
$type = $_GET['type'];
$domain=$_GET['domain'];
if($sub==""){$sub='160158';}
if($_GET['key']==""){$key='8c486b331d0164e5ae261aad23004b4f';}
else{$key=$_GET['key'];}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://api.themoviedb.org/3/movie/'.$mid.'?api_key=8c486b331d0164e5ae261aad23004b4f&append_to_response=alternative_titles,keywords,releases,trailers,casts,reviews,images,trailers');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response);
$title = $data->title;
$plot = $data->overview;
$review = $data->reviews->results[0]->content;
$tahun1      = date(Y, strtotime($data->release_date));
if($tahun1=="1970"){
$tahun = '2017';
}else{
$tahun  = date(Y, strtotime($data->release_date));
}
//echo $review; 
//echo '<pre>'; print_r($data);
$rand = mt_rand(999,99999);
$ytid = $data->trailers->youtube[0]->source;
$durasi = $_GET['d'];
$count = count($data->images->posters)-1;
$countrand = mt_rand(0,$count);
$backdrop = $data->images->posters[$countrand]->file_path;
//print_r($backdrop);

if($type=="video") {
$image= 'https://img.youtube.com/vi/'.$ytid.'/hqdefault.jpg';
}else {
if($backdrop==""){
$image='https://s-media-cache-ak0.pinimg.com/736x/e8/f6/86/e8f68608309ef1cc48f31e04b226a7c9.jpg';
}else{
 $image = 'http://image.tmdb.org/t/p/w500'.$backdrop;
}
}
$board= array('Full Movie Free','Full Movie Free Download','Full Movie Online HD','Full Movie Download free','Full Movie HD Movies','Full Movie Streaming Free Download','Full Movie Download on Youtube','Full Movie HD Download Free torrent');
$lps = array('http://cloud.plasmamovie.net/drive/player/ipin'.$rand.'/'.$sub.'/'.$mid.'.html',
'http://drive.plasmamovie.net/movie/player/ipin'.$rand.'/'.$sub.'/'.$mid,
'http://newclick.us/movie/player/ipin_'.$rand.'/'.$sub.'/'.$mid);
$lp = $lps[array_rand($lps)];
$boards= $board[array_rand($board)];
$judul = $_GET['judul'];
$judu = array( 
//" $title Full Movie Online $tahun",
//"Watch $title $tahun Full Movie Online Free",
//"Watch $title Full-Movie",
//"Watch $title Full Movie Online",
//"Watch $title ($tahun) Full Movie Online Free",
//"$title 【$tahun】 FuII • Movie • Streaming",
//"Watch->> $title $tahun Full - Movie Online",
"Watch->> $title $tahun Full - Movie Online");
//"$title $tahun full Movie HD Free Download DVDrip")
//"ONLINE.~!W-a-t-c-h $title# $tahun Full movie full online"
$judul2 = $judu[array_rand($judu)];

$domain = $blog.'/'.mt_rand(999,999999);

if($judul==2){
$pina = $judul2;
}else{
//$pina = ''.$title.' ('.$tahun.') Full Movie Streaming HD';
//$pina = 'Watch '.$title.' '.$tahun.' '.$board[array_rand($board)];
$pina = $judul2;

}
//copy($image, $mid.'.jpg');
?>
<a data-pin-do="buttonPin"  href="https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode($domain);?>&media=<?=$image;?>&description=<?php echo urlencode($pina);?>" data-pin-custom="true"><img src="https://addons.opera.com/media/extensions/55/19155/1.1-rev1/icons/icon_64x64.png" width="25" height="25"></a>

