<?php


$lang = $_COOKIE["pll_language"];

$personal_data= "Perfil";
$full_name = "Nombre completo";
$date_of_birth = "Año de Nacimiento";
$country = "País";
$city_town = "Ciudad";
$professional_experience = "Experiencia Profesional";
$company = "Empresa";
$occupation = "Cargo";
$educational_background = "Formación Academica";
$complementary_training = "Formación Complementaria";
$computing_skills = "Habilidades Informáticas";
$mother_tonge = "Idioma materno";
$foregin_languaje= "Idioma extranjero";
$level = "Nivel";

$curriculum = simplexml_load_file("curriculum-es.xml");

$personalInfo = $curriculum->personalInformation[0];
$name = $personalInfo->name->firstName . " " . $personalInfo->name->lastName;
$birth_date = $personalInfo->dateOfBirth;
$country1 = $personalInfo->country;
$city = $personalInfo->city;
$email = $personalInfo->contactInfo->email;
$phone_number = $personalInfo->contactInfo->telephone;
$website = $personalInfo->contactInfo->webSite;
$websitePic = $personalInfo->contactInfo->webSite["img"];

$professionalExperience = $curriculum->workExperience->professionalExperience;
$studies = $curriculum->academicInformation->study;
$courses =$curriculum->courses->course;
$skills = $curriculum->otherInformation->computingSkills->language;
$socials = $personalInfo->contactInfo->socialNetwork;
$languages = $curriculum->otherInformation->linguisticSkills->languageInfo;


?>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang;?>">

       <head>
          <meta http-equiv="content-type" content="application/xhtml+xml;charset=UTF-8"/>
          <meta http-equiv="content-language" content="<?php echo $lang;?>"/>
          <title><?php echo $name;?></title>
             <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

             <meta name="keywords" content=""/>
             <meta name="description" content=""/>

             <link rel="stylesheet"
                type="text/css"
                href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css"
                media="all"/>
             <link rel="shortcut icon" href="images/andonisanchezantolin.png"/>
             <link rel="stylesheet" type="text/css" href="curriculum.css" media="all"/>

       </head>
       <body>
          <div id="doc2" class="yui-t7">
                <div id="inner">
                      <div id="hd">
                            <div class="yui-gc">
                                  <div class="yui-u first">
                                        <h1><?php echo $name;?></h1>
                                  </div>

                                  <div class="yui-u">
                                        <div class="contact-info">
                                            <h3>
                               					<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                           					</h3>
                                           
                                            <h3>
                               					<a href="<?php echo $website;?>"><?php echo $website;?></a>
                            				</h3>
                                        </div>
                         <!--// .contact-info -->
                                  </div>
                            </div>
                   <!--// .yui-gc -->
                      </div>
                <!--// hd -->

                      <div class="yui-gf">
                         <div style="float:left">
                             <div class="yui-u first">
                                   <h2><?php echo $personal_data;?></h2>
                             </div>
                             <div class="yui-u">

	                            <p class="enlarge"><strong><?php echo $full_name;?></strong></p><p class="enlarge2"><?php echo $name;?></p>
	                         
	                            <p class="enlarge"><strong><?php echo $date_of_birth;?></strong></p><p class="enlarge"><?php echo $birth_date;?></p>
	                    
	                            <p class="enlarge"><strong><?php echo $country;?></strong></p><p class="enlarge"><?php echo $country1;?></p>
	                       
	                            <p class="enlarge"><strong><?php echo $city_town;?></strong></p><p class="enlarge"><?php echo $city;?></p>
	                    
	                         </div>
	                         </div>
	                            <div style="float:right">
	                               <img src="<?php echo $personalInfo->image;?>"
	                           alt="<?php echo $name;?>"
	                           width="150"
	                           height="200"/>
                         </div>
                      </div>
                <!--// .yui-gf -->


                <div class="yui-gf">


                         <div class="yui-u first">
                               <h2><?php echo $professional_experience;?></h2>
                         </div>
                   <!--// .yui-u -->

                         <div class="yui-u">
                         <?php foreach ($professionalExperience as $job) { ?>
                            <div class="job">
                                 <h2>
                                    <strong><?php echo $job->startDate . " / " . $job->endDate;?></strong>
                                 </h2>
                                 <h3>
                                    <strong><?php echo $company;?>: </strong><?php echo $job->company;?>
                                 </h3>
                                 <h3>
                                    <strong><?php echo $occupation;?>: </strong><?php echo $job->occupation;?>
                                <?php if ($job->description != "")
                                    echo "- $job->description"; ?>
                                </h3>
                            </div>
                         <?php } ?>
                         </div>
                   <!--// .yui-u -->

                      </div>
                <!--// .yui-gf -->

                <div class="yui-gf">

                            <div class="yui-u first">
                                <h2><?php echo $educational_background;?></h2>
                             </div>
                   <!--// .yui-u -->
                       <div class="yui-u">
                        <?php foreach ($studies as $e) { ?>
                            <div class="job">
                                <h2>
                                    <strong><?php echo $e->startDate." / ". $e->endDate;?></strong>
                                </h2>
                                <h3><?php echo $e->name;?></h3>
                                <h3><?php echo $e->center;?></h3>
                                <h3><?php echo $e->description;?></h3>
                             </div>
						<?php } ?>
                        </div>
                   <!--// .yui-u -->
                      </div>
                <!--// .yui-gf -->

                <div class="yui-gf">

                            <div class="yui-u first">
                                  <h2><?php echo $complementary_training;?></h2>
                             </div>
                   <!--// .yui-u -->
                       <div class="yui-u">
                        <?php foreach ($courses as $course){ ?>
                            <div class="job">
                            <?php if ($course->startDate !="") { ?>
                                    <h3><strong><?php echo $course->startDate." / ". $course->endDate;?></strong></h3>
                            <?php } ?>
                                  <h3><?php echo $course->name;?></h3>
                            <?php if ($course->center != "") { ?>
                                    <h3><?php echo $course->center;?></h3>
                            <?php } ?>
                            <?php if ($course->description !=""){ ?>
                                    <h3><?php echo $course->description;?></h3>
                            <?php } ?>
                                </div> 
                         <?php } ?>
                         </div>
                   <!--// .yui-u -->
                      </div>
                <!--// .yui-gf -->

                <div class="yui-gf">
						<div class="yui-u first">
							<h2><?php echo $computing_skills;?></h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
								<li>PHP/Node/Python</li>
								<li>HTML5/CSS3/.NET(C#/VB)</li>
								<li class="last">Javascript/JQuery</li>
							</ul>

							<ul class="talent">
								<li>Java/C/C++</li>
								<li>Apache Web Server</li>
								<li class="last">MySQL/Oracle SQL/SQL Server</li>
							</ul>

							<ul class="talent">
								<li>CVS/Subversion/Git</li>
								<li>OS X/Linux/Windows</li>
								<li class="last"></li>
							</ul>
						</div>
					</div><!--// .yui-gf-->

                <div class="yui-gf">
                            <div class="yui-u first">
                                  <h2><?php echo $mother_tonge;?></h2>
                            </div>
                            <div class="yui-u">

                            	<?php foreach ($languages as $languageYes) { ?>
                            		<?php if ($languageYes['motherTongue']=="yes"){?>
		                    			<div class="talent">
		                                       <h2><?php echo $languageYes->name;?></h2>
		                                       <p><?php echo $level.': '.$languageYes->level;?></p>
		                                 </div>
                                <?php }
                                } ?>
                            </div>
                      </div>
                <!--// .yui-gf -->

                      <div class="yui-gf">
                            <div class="yui-u first">
                                  <h2><?php echo $foregin_languaje;?></h2>
                            </div>
                            <div class="yui-u">
		                        <?php foreach ($languages as $languageNo) { ?> 
		                        	
                            		<?php if ($languageNo['motherTongue']=="no"){?>
		                    			<div class="talent">
		                                       <h2><?php echo $languageNo->name;?></h2>
		                                       <p><?php echo $level.': '.$languageNo->level;?></p>
		                                 </div>
                                <?php }
                                } ?>
                            </div>
                      </div>
                <!--// .yui-gf -->

                      <div id="ft">
                        <p> <a href="<?php echo $website;?>"><img src="<?php echo $websitePic;?>" width="30px"/></a>
                     <?php foreach ($socials as $social){ ?>      
                             <a href="<?php echo $social;?>"><img src="<?php echo $social["img"];?>" width="30px"/></a>
                     <?php } ?>
                </p>
                </div>
                <!--// footer -->
             </div>
             <!-- // inner -->
          </div>
       </body>
    </html>