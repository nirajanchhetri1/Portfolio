<?php
require_once 'system/AboutController.php';
require_once 'system/EducationController.php';
require_once 'system/ExperienceController.php';
require_once 'system/SkillController.php';
require_once 'system/CvController.php';

$about = new AboutController();
$data1 = $about->getData('about', null, null, 1);
$result = array();
foreach ($data1 as $newData) {
    $result = [
        'first_name' => $newData->first_name,
        'last_name' => $newData->last_name,
        'birthdate' => $newData->birthdate,
        'nationality' => $newData->nationality,
        'experience' => $newData->experience,
        'address' => $newData->address,
        'frelance' => $newData->frelance,
        'languages' => $newData->languages,
        'phone' => $newData->phone,
        'email' => $newData->email,
        'image' => $newData->image
    ];
}

// $result = $about->getWhereData('about', ['id' => 1], [], true);

$cvC = new CvController();
$cv = $cvC->getCv();

$educationc = new EducationController();
$educaitons = $educationc->getData('educations');

$experienceC = new EducationController();
$experiences = $experienceC->getData('experiences');

$skillC = new SkillController();
$skills = $skillC->getData('skills');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirajan Chhetri</title>
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/folio-logo.png" type="image/png" sizes="32x32">

</head>

<body>
    <?php require_once 'nav_bar.php'; ?>

    <div class="about-info">
        <div id="about-img" class="about-image">
            <img src="./images/about/<?= $result['image'] ?>" alt="about-image">
            <div class="image-border"></div>
        </div>

        <!-- <div class="about-info-list"> -->
        <ul class="info-left">
            <li>
                <p>First Name</p>
                <p><?= isset($result) ? $result['first_name'] : '' ?></p>
                <!-- First Name <span>Sabita</span> -->
            </li>
            <li>
                <p>Last Name</p>
                <p><?= isset($result) ? $result['last_name'] : '' ?></p>
                <!-- Last Name <span>Bhattarai</span> -->
            </li>
            <li>
                <p>Birthdate</p>
                <p><?= isset($result) ? $result['birthdate'] : '' ?></p>
                <!-- Birthdate <span>21 June 1990</span> -->
            </li>
            <li>
                <p>Nationality </p>
                <p><?= isset($result) ? $result['nationality'] : '' ?></p>
                <!-- Nationality <span>Nepali</span> -->
            </li>
            <li>
                <p>Experience</p>
                <p><?= isset($result) ? $result['experience'] : '' ?></p>
                <!-- Experience <span>3 years</span> -->
            </li>
            <li>
                <p>Address</p>
                <p><?= isset($result) ? $result['address'] : '' ?></p>
                <!-- Address <span>Kathmandu, Nepal</span> -->
            </li>
            <?php

            if (count((array) $cv) > 0) {
            ?>
                <div class="cv-button">
                    <a href="download.php?file=<?= $cv->id ?>">Download CV</a>

                    <!-- </li> -->
                </div>
            <?php

            }
            ?>
        </ul>

        <ul class="info-right">
            <li>
                <p>Freelance</p>
                <p><?= isset($result) && $result['frelance'] == 1 ? 'Available' : 'Unavailable' ?></p>
                <!-- First Name <span>Sabita</span> -->
            </li>
            <li>
                <p>Languages</p>
                <p><?= isset($result) ? $result['languages'] : '' ?></p>
                <!-- Last Name <span>Bhattarai</span> -->
            </li>
            <li>
                <p>Phone</p>
                <p><?= isset($result) ? $result['phone'] : '' ?></p>
                <!-- Birthdate <span>21 June 1990</span> -->
            </li>
            <li>
                <p>Email </p>
                <p><?= isset($result) ? $result['email'] : '' ?></p>
                <!-- Nationality <span>Nepali</span> -->
            </li>

            <?php

            if (count((array) $cv) > 0) {
            ?>
                <div class="cv-button-mobile">
                    <a href="download.php?file=<?= $cv->id ?>">Download CV</a>

                    <!-- </li> -->
                </div>
            <?php

            }
            ?>
        </ul>
        <!-- </div> -->


    </div>

    <hr class="my-hr">

    <div class="ex-edu">
        <div class="experience">
            <p>EXPERIENCE</p>
            <?php
            foreach ($experiences as $experience) {
            ?>
                <div class="experience-list">
                    <div class="time"><span class="left-circle"></span><i class="far fa-calendar-alt" style="font-size:150%; padding-right:12px;"></i> <?= $experience->start_date ?> - <?= $experience->present == 1 ? "Present" : $experience->end_date ?></div>
                    <div class="profession"><?= $experience->position ?> <span class="ex-span"><a target="_blank" href="<?= $experience->company_url?>"><?= $experience->company ?></a></span></div>
                    <div class="description"><?= $experience->description ?></div>
                </div>
            <?php
            }
            ?>

            <!-- <div class="experience-list">
                <div class="time">i 2017 - 2019</div>
                <div class="profession">WEB DESIGNER <span>ENVVVATO</span></div>
                <div class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla voluptate harum
                    provident.</div>
            </div>

            <div class="experience-list">
                <div class="time">i 2017 - 2019</div>
                <div class="profession">WEB DESIGNER <span>ENVVVATO</span></div>
                <div class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla voluptate harum
                    provident.</div>
            </div> -->

        </div>
        <div class="education">
            <p>EDUCATION</p>

            <?php
            foreach ($educaitons as $education) {
            ?>
                <div class="education-list">
                    <div class="time"><span class="left-circle"></span><i class="far fa-calendar-alt" style="font-size:150%; padding-right:12px;"></i> <?= $education->start_date ?> - <?= $education->is_running==1?'Running':$education->end_date ?></div>
                    <div class="profession"><?= $education->degree ?> <span class="edu-span"><a target="_blank" href="<?= $education->school_url?>"><?= $education->school ?></a></span></div>
                    <div class="description"><?= $education->description ?></div>
                </div>
            <?php
            }
            ?>
            <!-- 
            <div class="education-list">
                <div class="time">i 2017 - 2019</div>
                <div class="profession">WEB DESIGNER <span>ENVVVATO</span></div>
                <div class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla voluptate harum
                    provident.</div>
            </div>
            <div class="education-list">
                <div class="time">i 2017 - 2019</div>
                <div class="profession">WEB DESIGNER <span>ENVVVATO</span></div>
                <div class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla voluptate harum
                    provident.</div>
            </div> -->
        </div>
    </div>

    <hr class="my-hr-2">

    <div class="my-skills">
        MY SKILLS
    </div>
    <div class="skillset">

        <?php
        foreach ($skills as $skill) {
        ?>
            <div class="skill">
                <ul class="skill-text-no">
                    <li class="skill-field"><?= $skill->skill ?></li>
                    <li class="skill-percent"><?= $skill->confidence ?>%</li>
                </ul>
                <div class="percent-bar">
                    <div class="gray-bar">
                        <div class="coloured-bar" style="background: <?= $skill->color ?>; width: <?= $skill->confidence ?>%"></div>
                    </div>

                </div>
            </div>
        <?php
        }
        ?>
        <!-- <div class="skill">
            <ul class="skill-text-no">
                <li class="skill-field">CSS</li>
                <li class="skill-percent">90%</li>
            </ul>
            <div class="percent-bar">
                <div class="gray-bar">
                    <div class="coloured-bar" style="background:rgb(11, 54, 197); width: 90%;"></div>
                </div>
            </div>
        </div>

        <div class="skill">
            <ul class="skill-text-no">
                <li class="skill-field">Javascript</li>
                <li class="skill-percent">60%</li>
            </ul>
            <div class="percent-bar">
                <div class="gray-bar">
                    <div class="coloured-bar" style="background:rgb(204, 236, 22); width:60%;"></div>
                </div>
            </div>
        </div>
        <div class="skill">
            <ul class="skill-text-no">
                <li class="skill-field">Animation</li>
                <li class="skill-percent">90%</li>
            </ul>
            <div class="percent-bar">
                <div class="gray-bar">
                    <div class="coloured-bar" style="background:rgb(241, 20, 94); width:90%;"></div>
                </div>
            </div>
        </div>
        <div class="skill">
            <ul class="skill-text-no">
                <li class="skill-field">Javascript</li>
                <li class="skill-percent">60%</li>
            </ul>
            <div class="percent-bar">
                <div class="gray-bar">
                    <div class="coloured-bar" style="background:rgb(204, 236, 22); width:60%;"></div>
                </div>
            </div>
        </div>
        <div class="skill">
            <ul class="skill-text-no">
                <li class="skill-field">Animation</li>
                <li class="skill-percent">90%</li>
            </ul>
            <div class="percent-bar">
                <div class="gray-bar">
                    <div class="coloured-bar" style="background:rgb(241, 20, 94); width:90%;"></div>
                </div>
            </div>
        </div> -->
    </div>

    <script>
        var x = 0;

        function showNavList() {
            var element = document.getElementById("my-ul");
            var elementSection = document.getElementById("hero");
            var elementMyIconny = document.getElementById("my-iconny");
            var elementMyAboutImage = document.getElementById("about-img");
            console.log(elementMyAboutImage);
            element.classList.toggle("nav-right-list-ul");
            elementMyAboutImage.classList.toggle("mr-top-46-percent");
            // elementSection.classList.toggle("mr-top-46-percent");
            if (x == 0) {
                elementMyIconny.classList.remove("fa-times");
                elementMyIconny.classList.add("fa-bars");
                x = 1;
            } else {
                elementMyIconny.classList.remove("fa-bars");
                elementMyIconny.classList.add("fa-times");
                x = 0;

            }
        }
    </script>
</body>

</html>