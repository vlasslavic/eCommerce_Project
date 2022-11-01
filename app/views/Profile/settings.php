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