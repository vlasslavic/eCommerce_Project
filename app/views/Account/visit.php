<?php require  APPROOT . '/views/includes/header.php'?>;
<div id="mount_0_0_32 mt-5 pt-5"><span id="ssrb_root_start" style=""></span>
    <div>
        <div class="mt-5 pt-5">
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
                                            <div class="_aa_y _aa_z _aa_-">
                                                <header
                                                    class="x1gv9v1y x1dgd101 x186nx3s x1n2onr6 x2lah0s x1q0g3np x78zum5 x1qjc9v5 xlue5dm x1tb5o9v">
                                                    <div
                                                        class="xnc68me xzycmdw x1qql9gs x8efi63 x6ipk99 x1n2onr6 xl56j7k xdt5ytf x78zum5 x2lah0s">
                                                        <div
                                                            class="x1hq9uvk x3cuudn x1iks339 xfrsaff xkrivgy x1gryazu x1lliihq">
                                                            <div class="_aadm"><button class="_aadn"
                                                                    title="Change profile photo"><img
                                                                        alt="Change profile photo" class="_aadp"
                                                                        src="<?php echo''.URLROOT.'/public/img/account.jpg'?>"></button>
                                                                <div>
                                                                    <form enctype="multipart/form-data" method="POST"
                                                                        role="presentation"><input
                                                                            accept="image/jpeg,image/png" class="_ac69"
                                                                            type="file"></form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <section
                                                        class="xqa74as x1e2samy x180vxfj xi7qc1e x11njtxf xk390pu x1n2onr6 xkhd6sd x18d9i69 x4uap5 xexx8yu x1mh8g0r xat24cr x11i5rnm xdj266r xeuugli xs83m0k xdt5ytf x78zum5 x5n08af x9f619 xav7gou xaqea5y x1b1mbwd x6umtig x1qjc9v5">
                                                        <div class="x1n2onr6 xeuugli xs83m0k x1q0g3np x78zum5 x6s0dn4">
                                                            <h2 class="_aacl _aacs _aact _aacx _aada" tabindex="-1">
                                                            <?php 
                                                             $user = new \app\models\User();
                                                             $profile = new \app\models\Profile();
                                                             $profile = $profile->getProfile($data);
                                                             $user = $user->getUser($profile->user_id);
                                                            echo ''.$user->username.''; ?>
                                                                           </h2>
                                                            
                                                        </div>
                                                        <div class="x1lcz9gl xpow463">
                                                            <div></div>
                                                        </div>
                                                        <ul class="x78zum5 x1q0g3np xieb3on">
                                                            <li class="xl565be x1m39q7l x1uw6ca5 x2pgyrj">
                                                                <div class="_aacl _aacp _aacu _aacx _aad6 _aade"><span
                                                                        class="_ac2a"><?php

                                                                        $publications= new \app\models\Post();
                                                                        $publications= $publications->getAllPub($data);
                                                                        $postCount = sizeof( $publications);

                                                                        echo''.$postCount.'';?></span> posts</div>
                                                            </li>
                                                            <li class="xl565be x1m39q7l x1uw6ca5 x2pgyrj"><a
                                                                    class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _a6hd"
                                                                    href="" role="link"
                                                                    tabindex="0">
                                                                    <div class="_aacl _aacp _aacu _aacx _aad6 _aade">
                                                                        <span class="_ac2a" title="222">5024</span>
                                                                        followers
                                                                    </div>
                                                                </a></li>
                                                            <li class="xl565be x1m39q7l x1uw6ca5 x2pgyrj"><a
                                                                    class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _a6hd"
                                                                    href="" role="link"
                                                                    tabindex="0">
                                                                    <div class="_aacl _aacp _aacu _aacx _aad6 _aade">
                                                                        <span class="_ac2a">438</span> following
                                                                    </div>
                                                                </a></li>
                                                        </ul>
                                                        <div class="_aa_c"><span
                                                                class="_aacl _aacp _aacw _aacx _aad7 _aade"><?php 
                                                                $profile = new \app\models\Profile();
                                                                $profile = $profile->getProfile($data);
                                                                echo isset($profile->first_name)?''.$profile->first_name.' ':"";  echo isset($profile->middle_name)?''.$profile->middle_name.' ':""; echo isset($profile->last_name)?''.$profile->last_name:"" ?></span><br> </div>
                                                    </section>
                                                </header>
                                                
                                                <div class="x6s0dn4 x1b1mbwd xaqea5y xav7gou x9f619 x1itsidl x78zum5 x1q0g3np x2lah0s x1pg5gke xwhw2v2 xl56j7k x1r0g7yl xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 x2b8uid x11njtxf x1wzhzgj"
                                                    role="tablist"></div>
                                                <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9o _abcm">
                                                    <article class="_aayp">
                                                        <div>
                                                            <div
                                                                style="position: relative; display: flex; flex-direction: column; padding-bottom: 0px; padding-top: 0px;">
                                                                <div class="_ac7v _aang">
                                                                    <?php
                                                                    
                                                                     $publications= new \app\models\Post();
                                                                     $publications= $publications->getAllPub($data);
                                                                     $postCount = sizeof( $publications);
                                                                    foreach ($publications as $publication) {
                                                                       
                                                                        
                                                                    
                                                                    echo'
                                                                    <div class="_aabd _aa8k _aanf"><a
                                                                            class="x1i10hfl xjbqb8w x6umtig x1b1mbwd xaqea5y xav7gou x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz _a6hd"
                                                                            href="'.URLROOT.'Post/index/?publication_id='.$publication->publication_id.'" role="link"
                                                                            tabindex="0">
                                                                            <div class="_aagu">
                                                                                <div class="_aagv"><img
                                                                                        alt="Photo by user '.$publication->publication_id.' on '.$publication->date_time.'. '.$publication->caption.'"
                                                                                        crossorigin="anonymous"
                                                                                        class="x5yr21d xu96u03 x10l6tqk x13vifvy x87ps6o xh8yej3"
                                                                                        src="'.URLROOT.'public/uploads/'.$publication->picture.'"
                                                                                        style="object-fit: cover;">
                                                                                </div>
                                                                                <div class="_aagw"></div>
                                                                            </div>
                                                                            <div class="_aatp">
                                                                                <div
                                                                                    class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abak _abb0 _abbi _abb- _abcm">
                                                                                    <svg aria-label="Carousel"
                                                                                        class="_ab6-" color="#ffffff"
                                                                                        fill="#ffffff" height="22"
                                                                                        role="img" viewBox="0 0 48 48"
                                                                                        width="22">
                                                                                        <path
                                                                                            d="M34.8 29.7V11c0-2.9-2.3-5.2-5.2-5.2H11c-2.9 0-5.2 2.3-5.2 5.2v18.7c0 2.9 2.3 5.2 5.2 5.2h18.7c2.8-.1 5.1-2.4 5.1-5.2zM39.2 15v16.1c0 4.5-3.7 8.2-8.2 8.2H14.9c-.6 0-.9.7-.5 1.1 1 1.1 2.4 1.8 4.1 1.8h13.4c5.7 0 10.3-4.6 10.3-10.3V18.5c0-1.6-.7-3.1-1.8-4.1-.5-.4-1.2 0-1.2.6z">
                                                                                        </path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                        </a></div>
                                                                    ';}?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
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
