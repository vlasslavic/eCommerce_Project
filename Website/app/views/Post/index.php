<?php require  APPROOT . '/views/includes/header.php'?>

<?php 
        $publication = new \app\models\Post();
        $publication = $publication->getPub($data);
        $user= new \app\models\User();
        $profile= new \app\models\Profile();
        $profile=$profile->getProfile($publication->profile_id);
        $user=$user->getUser($profile->user_id);
        
        $commentAll = new \app\models\Comment();
        $commentAll = $commentAll->getAll($publication->publication_id);
        

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
    ?>

    <div style="width:100%; display:flex; justify-content:center; margin-top:8rem;">
                <article style="width:50rem;"
                                                                            class=" _ab6k _ab6m _aatb _aatc _aatd _aatf"
                                                                            role="presentation" tabindex="-1">
                                                                            <div class="_ab8w  _ab94 _ab99 _ab9h _ab9m _ab9p _abcm"
                                                                                style="max-height: inherit; max-width: inherit;">
                                                                                <div class="_aasi _aasj">
                                                                                    <div
                                                                                        class="_ab8w  _ab94 _ab97 _ab9i _ab9k _ab9p _abcm">
                                                                                        <header class="_aaqw _aaqx">
                                                                                            <div>
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
                                                                                                                src="<?php echo''.URLROOT.'';?>public/img/account.jpg"></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="_aaqy">
                                                                                                <div class="_aar0">
                                                                                                    <div class="x78zum5">
                                                                                                        <div class="_aaqt">
                                                                                                            <div
                                                                                                                class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                                                                <div
                                                                                                                    class="_aacl _aaco _aacw _aacx _aad6 _aade">
                                                                                                                    <span
                                                                                                                        class="_aap6 _aap7 _aap8"><a
                                                                                                                            class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _acan _acao _acat _acaw _a6hd"
                                                                                                                            href="<?php echo''.URLROOT.'';?>Account/visit/?profile_id=<?php echo''.($profile->profile_id).'';?>"
                                                                                                                            role="link"
                                                                                                                            tabindex="0"><?php echo''.$user->username.''; ?> aka <?php echo''.$profile->first_name.'';?> <?php echo''.$profile->middle_name.'';?> <?php echo''.$profile->last_name.'';?></a>
                                                                                                                        </span>
                                                                                                                        <?php echo''.((isset($publication) And isset($_SESSION['user_id']) And isset($user->user_id) And ($_SESSION['user_id']==$user->user_id))?'
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
                                                                                                                        '' ?>
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
                                                                                            </div>
                                                                                        </header>
                                                                                        
                                                                                        <a href="<?php echo''.URLROOT.'Post/edit/?publication_id='.($publication->publication_id).'';?>">
                                                                                        <div class="_aasm _aasn"><button
                                                                                                class="_abl-" type="button">
                                                                                                <div class="_abm0">
                                                                                                    <div class="_ab8w  _ab94 _ab97 _ab9h _ab9m _ab9p _abcm"
                                                                                                        style="height: 24px; width: 24px;">
                                                                                                        <svg aria-label="More options"
                                                                                                            class="_ab6-"
                                                                                                            color="#262626"
                                                                                                            fill="#262626"
                                                                                                            height="24"
                                                                                                            role="img"
                                                                                                            viewBox="0 0 24 24"
                                                                                                            width="24">
                                                                                                            <circle cx="12"
                                                                                                                cy="12"
                                                                                                                r="1.5">
                                                                                                            </circle>
                                                                                                            <circle cx="6"
                                                                                                                cy="12"
                                                                                                                r="1.5">
                                                                                                            </circle>
                                                                                                            <circle cx="18"
                                                                                                                cy="12"
                                                                                                                r="1.5">
                                                                                                            </circle>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </button></div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="<?php echo''.URLROOT.'Post/index/?publication_id='.($publication->publication_id).''?>">
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
                                                                                                        src="<?php echo''.URLROOT.'public/uploads/'.$publication->picture.'';?>"
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
                                                                                        <a href="<?php echo''.URLROOT.'Post/index/?publication_id='.($publication->publication_id).''?>">
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
                                                                                            <a href="<?php echo''.URLROOT.'Post/index/?publication_id='.($publication->publication_id).'';?>">
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
                                                                                                                    href="<?php echo''.URLROOT.'Account/visit/?profile_id='.($profile->profile_id).'';?>"
                                                                                                                    role="link"
                                                                                                                    tabindex="0"><span
                                                                                                                        class="_aacl _aaco _aacw _aacx _aad7 _aade">
                                                                                                                        <div
                                                                                                                            class=" _ab8y  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                                                                            <?php echo''.$user->username.'';?>
                                                                                                                        </div>
                                                                                                                    </span></a></span><span
                                                                                                                class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span><span
                                                                                                                class="_aacl _aaco _aacu _aacx _aad7 _aade"><span
                                                                                                                    class="_aacl _aaco _aacu _aacx _aad7 _aade"><?php echo''.$publication->caption.''?></span></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                       <hr>
                                                    
                                                    <?php
                                                     foreach ($commentAll as $comment) { 
                                                        $profileCom = new \app\models\Profile();
                                                        $userComment= new \app\models\User();
                                                        $profileCom = $profileCom->getProfile($comment->profile_id);
                                                        $userComment = $userComment->getUser($profileCom->user_id);
                                                        
                                                        // $comment->username=$userComment->username;
                                                        echo'     
                                                             <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abaj _abcm">
                                                                <div class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abaj _abcm">
                                                                    <div class=" _ab8x  _ab94 _ab99 _ab9f _ab9m _ab9o _abcm">
                                                                        <span class="_aap6 _aap7 _aap8">
                                                                            <a class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz notranslate _a6hd" href="'.URLROOT.'Account/visit?profile_id='.($comment->profile_id).'" role="link" tabindex="0">
                                                                                <span class="_aacl _aaco _aacw _aacx _aad7 _aade">
                                                                                    <div class=" _ab8y  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                                                        '.($userComment->username).'
                                                                                    </div>
                                                                                </span>
                                                                            </a>
                                                                        </span>
                                                                        <span class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span>
                                                                        <span class="_aacl _aaco _aacu _aacx _aad7 _aade">
                                                                            <span class="_aacl _aaco _aacu _aacx _aad7 _aade">'.($comment->comment).'</span>
                                                                        </span>

                                                                        '.(($_SESSION['user_id']==$userComment->user_id)?'
                                                                        <span  style="" class="_aacl _aaco _aacu _aacx _aad7 _aade">
                                                                        
                                                                        <span style="color:blue; display: inline!important;
                                                                        margin: 0!important;">

                                                                        <a class="btn" href="'.URLROOT.'Comment/edit/?comment_id='.$comment->comment_id.'">Edit</a>
                                                                      
                
                                                                        </span>
                                                                        <span class="_aacl _aaco _aacu _aacx _aad7 _aade">&nbsp;</span>
                                                                        <span style="color:red; display: inline!important;
                                                                        margin: 0!important;">
                                                                            <form class="_aad7 "style="display: inline!important;
                                                                            margin: 0!important;" action="" method="post">
                                                                            <input class="hiddenInput" name="deleteComment" value="'.$comment->comment_id.'">
                                                                            <button class="btn btn-danger" name="action" value="Submit Post" type="submit">Delete Comment</button> 
                                                                            </form>
                                                                        </span></span>':"").
                                                                        '
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            ';}
                                                        ?>
                                                    </div>
                                            </div>
                                            <div class="_ae5u">
                                                <div class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                    <div class="_aacl _aaco _aacu _aacx _aad6 _aade _aaqb">
                                                        <a class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _aaqd _a6hd"
                                                            href="/p/Cjlgk_uuTgU/" role="link" tabindex="0">
                                                            <div class="_aacl _aacm _aacu _aacy _aad6">
                                                                
                                                                <time class="_aaqe" datetime="2022-10-11T20:01:27.000Z"
                                                                    title="Oct 11, 2022"><?php echo''.$datediff.''?> days ago  <?php echo''.$publication->date_time.''?></time>
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
                                             <input class="hiddenInput" name="publication_id" value="<?php echo''.$publication->publication_id.''?>">
                                             <textarea aria-label="Add a comment…" placeholder="Add a comment…" class="a1" autocomplete="off" name="comment"  autocorrect="off"></textarea>
                                             <button class="_acan _acao _acas" name="action" value="Submit Comment"type="submit" ><div class="_aacl _aaco _aacw _aad0 _aad6 _aade">Post</div></button></form></div>
                                             </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    </article>
</div>

<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>

<?php require  APPROOT . '/views/includes/footer.php'?>;