<?php
require('Personne.php');

$personne = unserialize(urldecode($_GET['donnee']));

$cvContainer = "
<!DOCTYPE html>
<html>

<head>
    <meta name='viewport' content='width=device-width,initial-scale=1.0'>
    <title>responsive CV using <html>& css

        </html>
    </title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'
        integrity='sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' type='text/css' href='stylecv.css'>
</head>

<body>
    <div class='container'>
        <div class='left_side'>
            <div class='profileText'>
                <div class='imgBx'>
                    <img src='{$personne->getPhoto()}' alt='profile image'>
                </div>
                <h2>{$personne->getNom()}<br></h2>
            </div>

            <div class='contactInfo'>
                <h3 class='title'>contactInfo</h3>
                <ul>
                    <li>
                        <span class='icon'><i class='fa fa-phone' aria-hidden='true'></i>
                        </span>
                        <span class='text'>{$personne->getTelephone()}</span>

                    </li>
                    <li>
                        <span class='icon'><i class='fa fa-envelope-o' aria-hidden='true'></i>
                        </span>
                        <span class='text'>{$personne->getEmail()}</span>

                    </li>
                    <li>
                        <span class='icon'><i class='fa fa-globe' aria-hidden='true'></i>
                        </span>
                        <span class='text'>{$personne->getSite()}</span>

                    </li>
                    <li>
                        <span class='icon'><i class='fa fa-map-marker' aria-hidden='true'></i>
                        </span>
                        <span class='text'>{$personne->getAdresse()}</span>

                    </li>
                </ul>
            </div>

            <div class='contactInfo education'>
                <h3 class='title'>Education</h3>
                <ul>
                    <li>
                        <h4>{$personne->getFormation()}</h4>
                    </li>
                </ul>
            </div>

            <div class='contactInfo language'>
                <h3 class='title'>Soft Skills</h3>
                <ul>
                    <li>
                        <span class='text'>{$personne->getSkills()}</span>
                        
                    </li>
                </ul>
            </div>
        </div>

        <div class='right_side'>
            <div class='about'>
                <h2 class='title2'>Profile</h2>
                <p>
                {$personne->getCompetance()}
                </p>
            </div>
            <div class='about'>
                <h2 class='title2'>Experience</h2>
                <div class='box'>
                    <div class='year_company'>
                        <h4>{$personne->getExperience()}</h4>
                    </div>
                </div>
            </div>

            <div class='about interest'>
                <h2 class='title2'>Interest</h2> 
                <ul>
                    <li><i class='fa fa-gamepad' aria-hidden='true'></i>
                        Gaming</li>
                    <li><i class='fa fa-microphone' aria-hidden='true'></i>
                        Singing</li>
                    <li><i class='fa fa-book' aria-hidden='true'></i>
                        Reading</li>
                    <li><i class='fa fa-cutlery' aria-hidden='true'></i>
                        Cooking</li>
                </ul>
            </div>
        </div>

    </div>
</body>

</html>
";

echo $cvContainer;
?>