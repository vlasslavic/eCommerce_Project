<?php require  APPROOT . '/views/includes/header.php'?>;

<div class="bg-light container mt-5 pt-5" id="mount_0_0_TM"><span id="ssrb_root_start" style=""></span>
    <div class=" mt-4 ">
        <div class="">
            <div class="x9f619 x1n2onr6 x1ja2u2z"><span id="ssrb_top_nav_start" style="display: none;"></span><span
                    id="ssrb_top_nav_end" style="display: none;"></span>
                <div class="x9f619 x1n2onr6 x1ja2u2z">
                    <div class="x1ja2u2z x1n2onr6 xdt5ytf x78zum5">
                        <div class="x78zum5 xdt5ytf x1n2onr6">
                            <div class="x78zum5 xdt5ytf x1n2onr6 xat3117 xxzkxad">
                                <div class="x78zum5 xdt5ytf x10cihs4 x1t2pt76 x1n2onr6 x1ja2u2z">
                                    <div>
                                        <form enctype="multipart/form-data" method="POST" role="presentation"><input
                                                accept="image/jpeg" class="_ac69" type="file"></form>
                                    </div>
                                    <section class="_a997 _a998">
                                        <div></div>
                                        <main class="_a993 _a995" role="main">
                                            <div>
                                                <section class="_aalv _aalx">
                                                    <div class="_aam1 _aam4 _aam5">
                                                        <div class="_ab6o _ab6q"></div>
                                                        <div class="_aac4 _aac6">
                                                            <div class="_aauo" role="menu">
                                                                <div class="_aao_">
                                                                    <div class="_aap0" role="presentation">
                                                                        <div class="_aap1">
                                                                            <ul class=""
                                                                                style="display:flex; justify-content:flex-start!important; overflow-x:hidden; overflow-y:hidden;">


                                                                                <?php
$profiles= new \app\models\Profile();
$profiles=$profiles->getAll();
foreach ($profiles as $profile) {
    $user= new \app\models\User();
    $user=$user->getUser($profile->user_id);
    echo'
                                                                                <li class="" tabindex="-1" style="display:flex;"
                                                                                    ><a href="'.URLROOT.'Account/visit/?profile_id='.($profile->profile_id).'">
                                                                                    <div class="_aauk _aegn"><button
                                                                                            aria-label="Story by Veaci, not seen"
                                                                                            class="_aam8"
                                                                                            role="menuitem"
                                                                                            tabindex="0">
                                                                                            <div class="_aarf _aama"
                                                                                                aria-disabled="true"
                                                                                                role="button"
                                                                                                tabindex="-1"><canvas
                                                                                                    class="_aarh"
                                                                                                    height="66"
                                                                                                    width="66"
                                                                                                    style="position: absolute; top: -5px; left: -5px; width: 66px; height: 66px;"></canvas><span
                                                                                                    class="_aa8h"
                                                                                                    role="link"
                                                                                                    tabindex="-1"
                                                                                                    style="width: 56px; height: 56px;"><img
                                                                                                        alt="Veaci\'s profile picture"
                                                                                                        class="_aa8j"
                                                                                                        crossorigin="anonymous"
                                                                                                        draggable="false"
                                                                                                        src="'.URLROOT.'public/img/account.jpg"></span>
                                                                                            </div>
                                                                                            <div
                                                                                                class="_aacl _aacn _aacu _aacx _aad6 _aade">
                                                                                                <div
                                                                                                    class="_aamb _aamc">
                                                                                                    '.$user->username.'
                                                                                                    </div>
                                                                                            </div>
                                                                                        </button></div>
                                                                                </li>
                                                                                ';
                                                                            }
                                                                            ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div><button aria-label="Next"
                                                                        class=" _afxw _aahj _aahm" tabindex="-1">
                                                                        <div class=" _9zs2"></div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abc0 _abcm">
                                                            <div>
                                                                <div
                                                                    style="position: relative; display: flex; flex-direction: column;  padding-top: 0px;">

                                                                    <!-- POSTS START -->

<?php
    foreach ($data as $publication) {
        $user= new \app\models\User();
        $profile= new \app\models\Profile();
        $profile=$profile->getProfile($publication->profile_id);
        $user=$user->getUser($profile->user_id);
        
        $commentAll = new \app\models\Comment();
        $commentAll = $commentAll->getAll($publication->publication_id);
        $commentCount = sizeof( $commentAll);

        $oneComment= new \app\models\Comment(); 
        $oneComment= $oneComment->getOneComment($publication->publication_id);
        if(!isset($oneComment->comment)){
            $oneComment1= new \app\models\Comment();
            $oneComment1->comment="";
            $oneComment1->username="";
            $oneComment1->profile_id="";
            $oneComment = $oneComment1;
        }elseif(isset($oneComment->comment)){
            $profileComment= new \app\models\Profile();
            $profileComment=$profileComment->getProfile($oneComment->profile_id);
            $userComment= new \app\models\User();
            $userComment=$userComment->getUser($profileComment->user_id);
            $oneComment->username=$userComment->username;
        };
        // get how many days ago the post was made
        $now = strtotime((new \DateTime())->format('Y-m-d H:i:s'));
        $date2 = strtotime( $publication->date_time);
        $diff = abs($date2 - $now);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24)
                                 / (30*60*60*24));
        $datediff = floor(($diff - $years * 365*60*60*24 -
               $months*30*60*60*24)/ (60*60*24));

        echo'
        <article
                                                                            class=" _ab6k _ab6m _aatb _aatc _aatd _aatf"
                                                                            role="presentation" tabindex="-1">
                                                                            <div class="_ab8w  _ab94 _ab99 _ab9h _ab9m _ab9p _abcm"
                                                                                style="max-height: inherit; max-width: inherit;">
                                                                                <div class="_aasi _aasj">
                                                                                    <div
                                                                                        class="_ab8w  _ab94 _ab97 _ab9i _ab9k _ab9p _abcm">
                                                                                        <header class="_aaqw _aaqx">
                                                                                            <span>
                                                                                                <div
                                                                                                    class="_aap6 _aap7 _aapa">
                                                                                                    <div class="_aarf _aarg _aaqq"
                                                                                                        aria-disabled="false"
                                                                                                        role="button"
                                                                                                        tabindex="0"
                                                                                                        style="cursor: pointer;">
                                                                                                        <canvas
                                                                                                            class="_aarh"
                                                                                                            height="42"
                                                                                                            width="42"
                                                                                                            style="position: absolute; top: -5px; left: -5px; width: 42px; height: 42px;"></canvas><span
                                                                                                            class="_aa8h"
                                                                                                            role="link"
                                                                                                            tabindex="-1"
                                                                                                            style="width: 32px; height: 32px;"><img
                                                                                                                alt=" profile picture"
                                                                                                                class="_aa8j"
                                                                                                                crossorigin="anonymous"
                                                                                                                draggable="false"
                                                                                                                src="'.URLROOT.'public/img/account.jpg"></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                            <span class="_aaqy">
                                                                                                <div class="_aar0">
                                                                                                    <div class="x78zum5">
                                                                                                        <div class="_aaqt">
                                                                                                            <div
                                                                                                                class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                                                                <div
                                                                                                                    class="_aacl _aaco _aacw _aacx _aad6 _aade">
                                                                                                                    <span
                                                                                                                        class="_aap6 _aap7 _aap8">
                                                                                                                        <a
                                                                                                                            class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _acan _acao _acat _acaw _a6hd"
                                                                                                                            href="'.URLROOT.'Account/visit/?profile_id='.($profile->profile_id).'"
                                                                                                                            role="link"
                                                                                                                            tabindex="0">'.$user->username.' aka '.$profile->first_name.' '.$profile->middle_name.' '.$profile->last_name.'
                                                                                                                        </a>
                                                                                                                    </span>
                                                                                                                    '.((isset($publication) And isset($_SESSION['user_id']) And isset($user->user_id) And ($_SESSION['user_id']==$user->user_id))?'
                                                                                                                        <span  style="" class="_aacl _aaco _aacu _aacx _aad7 _aade">
                                                                                                                            
                                                                                                                            <span style="color:blue; display: inline!important;
                                                                                                                            margin: 0!important;">

                                                                                                                            <a class="btn" href="'.URLROOT.'Post/edit/?publication_id='.$publication->publication_id.'">Edit</a>
                                                                                                                        
                                                                    
                                                                                                                            </span>
                                                                                                                            <span class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span>
                                                                                                                            <span style="color:red; display: inline!important;
                                                                                                                            margin: 0!important;">
                                                                                                                                <form class="_aad7 "style="display: inline!important;
                                                                                                                                margin: 0!important;" action="" method="post">
                                                                                                                                <input class="hiddenInput" name="delete" value="'.$publication->publication_id.'">
                                                                                                                                <button class="btn btn-danger" name="action" value="Submit Post" type="submit">Delete</button> 
                                                                                                                                </form>
                                                                                                                            </span>
                                                                                                                        </span>':"").
                                                                                                                        '
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="_aaql">
                                                                                                    <div
                                                                                                        class="_aacl _aacn _aacu _aacx _aad6 _aade">
                                                                                                        <div
                                                                                                            class="xdt5ytf x78zum5">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="_aaqm">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </span>
                                                                                            
                                                                                        </header>
                                                                                        
                                                                                        <a href="'.URLROOT.'Post/edit?publication_id='.($publication->publication_id).'">
                                                                                        <div class="_aasm _aasn"><button
                                                                                                class="_abl-" type="button">
                                                                                                <div class="_abm0">
                                                                                                
                                                                                                    <div class="_ab8w  _ab94 _ab97 _ab9h _ab9m _ab9p _abcm"
                                                                                                        style="height: 24px; width: 24px;">
                                                                                                       
                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </button></div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="'.URLROOT.'Post/index?publication_id='.($publication->publication_id).'">
                                                                                <div class="_aatk">
                                                                                    <div role="button" class="_aa06"
                                                                                        tabindex="0">
                                                                                        <div>
                                                                                            <div class="_aagu _aato">
                                                                                                <div class="_aagv"
                                                                                                    style="padding-bottom: 100%;">
                                                                                                    <img alt="Photo associated with this post =("
                                                                                                        crossorigin="anonymous"
                                                                                                        class="x5yr21d xu96u03 x10l6tqk x13vifvy x87ps6o xh8yej3"
                                                                                                        src="'.URLROOT.'public/uploads/'.$publication->picture.'"
                                                                                                        style="object-fit: cover;">
                                                                                                </div>
                                                                                                <div class="_aagw"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </a>
                                                                                <div
                                                                                    class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm">
                                                                                    <div class="_ae1h _ae1i _ae1l"
                                                                                        role="presentation" tabindex="-1">
                                                                                        <div class="_ae2s">
                                                                                        <a href="'.URLROOT.'Post/index?publication_id='.($publication->publication_id).'">
                                                                                            <section
                                                                                                class="_aamu _ae3_ _ae40">
                                                                                                <span
                                                                                                    class="_aamx"><button
                                                                                                        class="_abl-"
                                                                                                        type="button">
                                                                                                        <div
                                                                                                            class="_abm0 _abm1">
                                                                                                            <svg aria-label="Comment"
                                                                                                                class="_ab6-"
                                                                                                                color="#8e8e8e"
                                                                                                                fill="#8e8e8e"
                                                                                                                height="24"
                                                                                                                role="img"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                width="24">
                                                                                                                <path
                                                                                                                    d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    stroke-width="2">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="_abm0 _abl_">
                                                                                                            <svg aria-label="Comment"
                                                                                                                class="_ab6-"
                                                                                                                color="#262626"
                                                                                                                fill="#262626"
                                                                                                                height="24"
                                                                                                                role="img"
                                                                                                                viewBox="0 0 24 24"
                                                                                                                width="24">
                                                                                                                <path
                                                                                                                    d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z"
                                                                                                                    fill="none"
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    stroke-width="2">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </button>
                                                                                            </section>
                                                                                            <a href="'.URLROOT.'Post/index?publication_id='.($publication->publication_id).'">
                                                                                            <section class="_ae5m">
                                                                                                <div
                                                                                                    class="_ab8w  _ab94 _ab99 _ab9f _ab9k _ab9o _abcm">
                                                                                                    <div
                                                                                                        class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9o _ab9r  _aba- _abbg _abby _abce _abcm">
                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </section>
                                                                                            <div class="_ae5q">
                                                                                                <div
                                                                                                    class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm">
                                                                                                    <div
                                                                                                        class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abak _abcm">
                                                                                                        <div
                                                                                                            class=" _ab8x  _ab94 _ab99 _ab9f _ab9m _ab9o _abcm">
                                                                                                            <span
                                                                                                                class="_aap6 _aap7 _aap8"><a
                                                                                                                    class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd"
                                                                                                                    href="'.URLROOT.'Account/visit/?profile_id='.($profile->profile_id).'"
                                                                                                                    role="link"
                                                                                                                    tabindex="0"><span
                                                                                                                        class="_aacl _aaco _aacw _aacx _aad7 _aade">
                                                                                                                        <div
                                                                                                                            class=" _ab8y  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                                                                            '.$user->username.'
                                                                                                                        </div>
                                                                                                                    </span></a></span><span
                                                                                                                class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span><span
                                                                                                                class="_aacl _aaco _aacu _aacx _aad7 _aade"><span
                                                                                                                    class="_aacl _aaco _aacu _aacx _aad7 _aade">'.$publication->caption.'</span></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abak _abcm">
                                                                                                        <a class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _a6hd"
                                                                                                            href="'.URLROOT.'Post/index?publication_id='.($publication->publication_id).'"
                                                                                                            role="link"
                                                                                                            tabindex="0">
                                                                                                            <div
                                                                                                                class="_aacl _aaco _aacu _aacy _aad6 _aade">
                                                                                                                View all
                                                                                                                <span>'.$commentCount.'</span>
                                                                                                                comments
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abaj _abcm">
                                                                                                        <div class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abaj _abcm">
                                                                                                            <div class=" _ab8x  _ab94 _ab99 _ab9f _ab9m _ab9o _abcm">
                                                                                                                <span class="_aap6 _aap7 _aap8">
                                                                                                                    <a class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd" href="'.URLROOT.'Account/visit?profile_id='.($oneComment->profile_id).'"
                                                                    role="link" tabindex="0">
                                                                    <span class="_aacl _aaco _aacw _aacx _aad7 _aade">
                                                                        <div
                                                                            class=" _ab8y  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                            '.($oneComment->username).'</div>
                                                                    </span>
                                                                    </a>
                                                                    </span>
                                                                    <span
                                                                        class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span>
                                                                    <span class="_aacl _aaco _aacu _aacx _aad7 _aade">
                                                                        <span
                                                                            class="_aacl _aaco _aacu _aacx _aad7 _aade">'.($oneComment->comment).'</span>
                                                                    </span>
                                                                    '.((isset($oneComment) And isset($_SESSION['user_id']) And isset($userComment->user_id) And ($_SESSION['user_id']==$userComment->user_id))?'
                                                                        <span  style="" class="_aacl _aaco _aacu _aacx _aad7 _aade">
                                                                        
                                                                        <span style="color:blue; display: inline!important;
                                                                        margin: 0!important;">

                                                                        <a class="btn" href="'.URLROOT.'Comment/edit/?comment_id='.$oneComment->comment_id.'">Edit</a>
                                                                      
                
                                                                        </span>
                                                                        <span class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span>
                                                                        <span style="color:red; display: inline!important;
                                                                        margin: 0!important;">
                                                                            <form class="_aad7 "style="display: inline!important;
                                                                            margin: 0!important;" action="" method="post">
                                                                            <input class="hiddenInput" name="deleteComment" value="'.$oneComment->comment_id.'">
                                                                            <button class="btn btn-danger" name="action" value="Submit Post" type="submit">Delete Comment</button> 
                                                                            </form>
                                                                        </span></span>':"").
                                                                        '

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="_ae5u">
                                                <div class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                    <div class="_aacl _aaco _aacu _aacx _aad6 _aade _aaqb">
                                                        <a class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _aaqd _a6hd"
                                                            href="/p/Cjlgk_uuTgU/" role="link" tabindex="0">
                                                            <div class="_aacl _aacm _aacu _aacy _aad6">
                                                                
                                                                <time class="_aaqe" datetime="2022-10-11T20:01:27.000Z"
                                                                    title="Oct 11, 2022">'.$datediff.' days ago  ('.$publication->date_time.')</time>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abb0 _abcm">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <section class=" _ae5y "><div class="_aaof">
                                            <form class="_aao9" method="POST">
                                                <div class=" _aaob"><div><button class="_abl- _abm2" type="button">
                                             </button></div></div>
                                             <input class="hiddenInput" name="publication_id" value="'.$publication->publication_id.'">
                                             <textarea aria-label="Add a comment…" placeholder="Add a comment…" class="a1" autocomplete="off" name="comment"  autocorrect="off"></textarea>
                                             <button class="_acan _acao _acas" name="action" value="Submit Comment"type="submit" ><div class="_aacl _aaco _aacw _aad0 _aad6 _aade">Post</div></button></form></div>
                                             </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    </article>
                    ';
                    }
                    ?>

                                                                    <!-- POSTS END -->
                                                                </div>
                                                            </div>
                                                            <div class="_aalg">
                                                                <!-- <div class="_ab8w  _ab94 _ab99 _ab9h _ab9m _ab9p _abdu _abcm"
                                                                    data-visualcompletion="loading-state"
                                                                    style="height: 32px; width: 32px;"><svg
                                                                        aria-label="Loading..." class=" _abdx"
                                                                        viewBox="0 0 100 100">
                                                                        <rect fill="#555555" height="6" opacity="0"
                                                                            rx="3" ry="3" transform="rotate(-90 50 50)"
                                                                            width="25" x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.08333333333333333" rx="3" ry="3"
                                                                            transform="rotate(-60 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.16666666666666666" rx="3" ry="3"
                                                                            transform="rotate(-30 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6" opacity="0.25"
                                                                            rx="3" ry="3" transform="rotate(0 50 50)"
                                                                            width="25" x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.3333333333333333" rx="3" ry="3"
                                                                            transform="rotate(30 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.4166666666666667" rx="3" ry="3"
                                                                            transform="rotate(60 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6" opacity="0.5"
                                                                            rx="3" ry="3" transform="rotate(90 50 50)"
                                                                            width="25" x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.5833333333333334" rx="3" ry="3"
                                                                            transform="rotate(120 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.6666666666666666" rx="3" ry="3"
                                                                            transform="rotate(150 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6" opacity="0.75"
                                                                            rx="3" ry="3" transform="rotate(180 50 50)"
                                                                            width="25" x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.8333333333333334" rx="3" ry="3"
                                                                            transform="rotate(210 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                        <rect fill="#555555" height="6"
                                                                            opacity="0.9166666666666666" rx="3" ry="3"
                                                                            transform="rotate(240 50 50)" width="25"
                                                                            x="72" y="47"></rect>
                                                                    </svg></div>
                                                            </div> -->
                                                            </div>
                                                        </div>
                                                </section>
                                            </div>
                                            <div>
                                                <form enctype="multipart/form-data" method="POST" role="presentation">
                                                    <input accept="image/jpeg,image/png" class="_ac69" type="file">
                                                </form>
                                            </div>
                                            <div class="_aag2"></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </main>

                                        <?php require APPROOT . '/views/includes/footer.php'; ?>
                                    </section>
                                    <div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div><span id="ssrb_root_end" style="display: none;"></span>
</div>


