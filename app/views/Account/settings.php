<?php require  APPROOT . '/views/includes/header.php'?>;

<?php
	if(isset($_GET['error'])){ ?>
<div class="alert alert-danger headline" role="alert">
    <?= $_GET['error'] ?>
</div>
<?php	}
	if(isset($_GET['message'])){ ?>
<div class="alert alert-success headline" role="alert">
    <?= $_GET['message'] ?>
</div>
<?php	}
?>
<div>
    <div id="mount_0_0_32"><span id="ssrb_root_start" style="display: none;">

        </span>
        <div>
            <div class="">
                <div class="x9f619 x1n2onr6 x1ja2u2z">
                    <span id="ssrb_top_nav_start" style="display: none;"></span><span id="ssrb_top_nav_end"
                        style="display: none;"></span>
                    <div class="x9f619 x1n2onr6 x1ja2u2z">

                        <div class="x1ja2u2z x1n2onr6 xdt5ytf x78zum5">
                            <div class="x78zum5 xdt5ytf x1n2onr6">
                                <div class="x78zum5 xdt5ytf x1n2onr6 xat3117 xxzkxad">
                                    <div class="x78zum5 xdt5ytf x10cihs4 x1t2pt76 x1n2onr6 x1ja2u2z">

                                        <section class="_a997 _a998">
                                            <div></div>
                                            <main class="_a993 _a995" role="main">
                                                <div class="_ab81 _ab82">
                                                    <ul class="_ab85">
                                                        <li><a class="x1i10hfl x1qjc9v5 xjbqb8w xjqpnuy xa49m3k xqeqjp1 x2hbi6w x13fuv20 xu3j5b3 x1q0q8m5 x26u7qi x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1ypdohk x78zum5 xdl72j9 xdt5ytf x2lah0s xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r x2lwn1j xeuugli xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 x16tdsg8 x1hl2dhg xggy1nq x1ja2u2z x1t137rt _ab86 _ab87 _a6hd"
                                                                href="/accounts/edit/" role="link" tabindex="0">
                                                                <div class="_ad7z">Edit profile</div>
                                                            </a></li>
                                                        
                                                        <li><a class="x1i10hfl x1qjc9v5 xjbqb8w xjqpnuy xa49m3k xqeqjp1 x2hbi6w x13fuv20 xu3j5b3 x1q0q8m5 x26u7qi x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1ypdohk x78zum5 xdl72j9 xdt5ytf x2lah0s xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r x2lwn1j xeuugli xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 x16tdsg8 x1hl2dhg xggy1nq x1ja2u2z x1t137rt _ab86 _ab88 _a6hd"
                                                                href="<?php echo''.URLROOT.'User/updatePassword'?>" role="link"
                                                                tabindex="0">
                                                                <div class="_ad7z">Change password</div>
                                                            </a></li>
                                                        
                                                        <div class="_aav4 _aav5">
                                                            <hr class="_aa1g _aest">
                                                            <div
                                                                class="_ab8w  _ab94 _ab95 _ab9f _ab9m _ab9p  _abap _abb6 _abbl _abc3 _abcm">
                                                                <div aria-disabled="false" role="button" tabindex="0"
                                                                    style="cursor: pointer; display: flex; flex-direction: column;">
                                                                    
                                                                    <div
                                                                        class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abc0 _abcm">
                                                                        <div class="_aacl _aacp _aacw _aad0 _aad6">
                                                                            Accounts
                                                                            Center</div>
                                                                    </div>
                                                                    <div
                                                                        class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abc0 _abcm">
                                                                        <div class="_aacl _aacn _aacu _aacy _aad6">
                                                                            Control
                                                                            settings for connected experiences across
                                                                            Instasha, the FaceJournal app and Messenjer,
                                                                            including story and post sharing and logging
                                                                            in.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                    <article class="_ab83">
                                                        <div class="_ab4f">
                                                            <div class="_ab4g">
                                                                <div class="_aadm"><button class="_aadn"
                                                                        title="Change profile photo"><img
                                                                            alt="Change profile photo" class="_aadp"
                                                                            src="<?php echo''.URLROOT.'/public/img/account.jpg'?>"></button>
                                                                    <div>
                                                                        <form enctype="multipart/form-data"
                                                                            method="POST" role="presentation"><input
                                                                                accept="image/jpeg,image/png"
                                                                                class="_ac69" type="file"></form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="_ab4h">
                                                                <h1 class="_ab4i " title="veaci_vlas" tabindex="-1">
                                                                    <?php echo''.$_SESSION["username"].'' ?>
                                                                </h1>
                                                                <div class=" _acao _acas disabled ">
                                                                    Change profile photo(not
                                                                    available)</div>
                                                                <div>
                                                                    <form enctype="multipart/form-data" method="POST"
                                                                        role="presentation"><input
                                                                            accept="image/jpeg,image/png" class="_ac69"
                                                                            type="file"></form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form class="_ab43" method="post" action="">
                                                            <div class="_ab3p">
                                                                <aside class="_ad6_"><label class="_ab3q"
                                                                        for="pepName">Name:</label></aside>
                                                                <div class="_ab3t">
                                                                    <div class=" _ab8y  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm"
                                                                        style="width: 100%; max-width: 355px;"><input
                                                                            aria-required="false" id="pepName"
                                                                            placeholder="First Name" type="text"
                                                                            class="_ab3_ _ac4d" name="first_name"
                                                                            value="<?php echo isset($data->first_name)?$data->first_name:'' ?>">
                                                                            <input
                                                                            aria-required="false" id="pepName"
                                                                            placeholder="First Name" type="text"
                                                                            class="hiddenInput" name="profile_id"
                                                                            value="<?php echo isset($data->profile_id)?$data->profile_id:'' ?>">
                                                                            <div  class="_ad6_"></div>
                                                                            <input aria-required="false" id="pepName"
                                                                            placeholder="Middle Name" type="text"
                                                                            class="_ab3_ _ac4d" name="middle_name"
                                                                            value="<?php echo isset($data->middle_name)?$data->middle_name:'' ?>">
                                                                            <div  class="_ad6_" ></div>
                                                                        <input aria-required="false" id="pepName"
                                                                            placeholder="Last Name" type="text"
                                                                            class="_ab3_ _ac4d" name="last_name"
                                                                            value="<?php echo isset($data->last_name)?$data->last_name:'' ?>">
                                                                        <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abak _abc0 _abcm"
                                                                            style="width: 100%; max-width: 355px;">
                                                                            <div
                                                                                class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abam _abcm">
                                                                                <div
                                                                                    class="_aacl _aacn _aacu _aacy _aad6">
                                                                                    Help people discover your account by
                                                                                    using the name you' re known by:
                                                                                    either your full name, nickname, or
                                                                                    business
                                                                                    name.</div>
                                                                            </div>
                                                                            <div class="_aacl _aacn _aacu _aacy _aad6">
                                                                                You
                                                                                can only change your name twice within
                                                                                14
                                                                                days.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="_ab3p">
                                                                <aside class="_ad6_"><label class="_ab3q"
                                                                        for="pepUsername">Username</label>
                                                                </aside>
                                                                <div class="_ab3t _ac4d">
                                                                    <div class="_ac4d _ab8y  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm"
                                                                        style="width: 100%; max-width: 355px;"><input
                                                                            disabled
                                                                            aria-required="true" id="pepUsername"
                                                                            placeholder="Username" type="text"
                                                                            class="_ab3_ _ac4d"
                                                                            value="<?php echo ''.$_SESSION["username"].'' ?>"
                                                                            >
                                                                        <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abak _abc0 _abcm"
                                                                            style="width: 100%; max-width: 355px;">
                                                                            <div
                                                                                class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abam _abcm">
                                                                                <div
                                                                                    class="_aacl _aacn _aacu _aacy _aad6">
                                                                                    In most cases, you'll be able to
                                                                                    change
                                                                                    your username back to veaci_vlas for
                                                                                    another 14 days. <a
                                                                                        aria-label="Learn more about changing your username"
                                                                                        class="_ab41 _ab42"
                                                                                        disabled=""
                                                                                        href="https://help.instagram.com/876876079327341"
                                                                                        rel="nofollow noopener noreferrer"
                                                                                        target="_blank">Learn
                                                                                        more</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="_aacl _aacn _aacu _aacy _aad6">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="_ab3p">
                                                                <aside class="_ad6_ _ad71"><label class="_ab3q"></label>
                                                                </aside>
                                                                <div class="_ab3t">
                                                                    <div class="_ab47">
                                                                        <button class="_acan _acap _acas" name="action" value="SaveProfile"type="submit">Submit</button>
                                                                        <div class="_ab48"><button
                                                                                class="_acan _acao _acas"
                                                                                type="button"  disabled>Temporarily deactivate my
                                                                                account</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </article>
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
</div>
