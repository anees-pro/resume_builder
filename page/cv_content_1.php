<?php
$resume['contact'] = str_replace('\\',"",$resume['contact']);
$resume['skills'] = str_replace('\\',"",$resume['skills']);
// $resume['works'] = str_replace('\\',"",$resume['experience']);

$resume['education'] = str_replace('\\',"",$resume['education']);


$contact = json_decode($resume['contact']);
$skills = json_decode($resume['skills']);
$works = json_decode($resume['experience']);
$education = json_decode($resume['education']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
	  <link rel="stylesheet" href="<?=$action->helper->loadcss('reset-fonts-grids.css')?>">
    <link rel="stylesheet" href="<?=$action->helper->loadcss('cv_content_1.css')?>">

   <link rel="icon" href="<?=$action->helper->loadimage('logo.png')?>">
    <title><?=@$title?></title>
</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">

		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?=@$resume['name']?></h1>
					<h2><?=@$resume['headline']?></h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a id="pdf" href="#"><?=$contact->mobile?></a></h3>
						<h3><a href="mailto:<?=$contact->email?>"><?=$contact->email?></a></h3>
						<h3><?=$contact->address?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Objective</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								<?=$resume['objective']?>
							</p>
						</div>
					</div><!--// .yui-gf -->

				
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							<?php
foreach($skills as $skill){
	?>
	<ul class="talent">
<li><?=$skill?></li>
</ul>
	<?php
}
							?>
							
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
<?php
if(count($works)<1){
	?>
<div class="job last">
							
<h3>Fresher</h3>
						
</div>
	<?php
}
foreach($works as $work){
	?>
	<div class="job">
								<h2><?=$work->company?></h2>
								<h3><?=$work->jobrole?></h3>
								<h4><?=$work->w_duration?></h4>
								<p><?=$work->work_desc?> </p>
							</div>
	<?php
}
?>
						

							

						

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
<?php
if(count($education)<1){
	?>
<div class="yui-u"">
						
							<h3>no education </h3>
						</div>
	<?php
}
foreach($education as $ed){
	?>
	<div class="yui-u" style="padding:10px 0px;border-bottom:1px solid rgba(0,0,0,0.1)">
							<h2><?=$ed->college?></h2>
							<h3><?=$ed->course?> &mdash; ( <?=$ed->e_duration?> ) </h3>
						</div>
	<?php
}
?>
				

					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?=$resume['name']?> &mdash; <a href="mailto:<?=$contact->email?>"><?=$contact->email?></a> &mdash;<?=$contact->mobile?></p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->
