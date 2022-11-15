<?php require  APPROOT . '/views/includes/header.php'?>
<?php
	if(isset($_GET['error'])){ ?>
<div class="alert alert-danger" role="alert">
  <?= $_GET['error'] ?>
</div>
<?php	}
	if(isset($_GET['message'])){ ?>
<div class="alert alert-success" role="alert">
  <?= $_GET['message'] ?>
</div>
<?php	}
?>




                <div class="container" style="display: flex; flex-direction: row; justify-content:center; height: 80%; max-width: 80%; margin-top:2rem;">
                    <div
                        style="width: 1013px; max-width: 1195px; min-width: 688px; min-height: 391px; max-height: 700px;">
                        <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9o _ab9s _abcm">
                            <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm" style="width: 100%;">
                                <div class="xdt5ytf x78zum5 x1qjc9v5">
                                    <div class="_ac76">
                                        <div class="_ab8w  _ab94 _ab97 _ab9h _ab9m _ab9p  _abch _abcm"
                                            style="height: 100%; width: 100%;">
                                            <h1 class="_ac78" style="width: calc(100% - 135.156px);">
                                                <div class="_ac7a">Create new post</div>
                                            </h1>
                                        </div>
                                        <div class="_ac7b _ac7c">
                                            <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abb0 _abcm"><a href="<?php echo ''.URLROOT.'Main/index'?>"><button
                                                    class="_abl-" type="button">
                                                    <div class="_abm0"><svg aria-label="Back" class="_ab6-"
                                                            color="#262626" fill="#262626" height="24" role="img"
                                                            viewBox="0 0 24 24" width="24">
                                                            <line fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" x1="2.909" x2="22.001" y1="12.004"
                                                                y2="12.004"></line>
                                                            <polyline fill="none"
                                                                points="9.276 4.726 2.001 12.004 9.276 19.274"
                                                                stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"></polyline>
                                                        </svg></div>
                                                </button></a></div>
                                        </div>
                                        <div class="_ac7b _ac7d">
                                            <!-- <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _ab9- _abaa _abcm"><button
                                                    class="_acan _acao _acas" style="font-size: 20px;" type="button">Share</button></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_ac2r _ac2s" style="width: 1013px;">
                                <div class="_ac2t _ac2u" style="opacity: 1;">
                                    <div class="_abma">
                                        <div class="_abmb">
                                            <div class=""></div>
                                            <div class="">
                                                <div style=" display:flex!important; justify-content:center!important;" class="" >
                                                <!-- <img style="width: 20%; height: 20%; display:flex!important; justify-content:center!important;"
                                                        alt="Photo for tag placement" class=""
                                                        src="<?php echo (isset($data['image'])?  ''.URLROOT.'public/uploads/'.$data['image'].'' : ''); ?>"> -->
                                                    <div class="_aazm" role="button" tabindex="0"></div>
                                                    <div style="position: absolute;">
                                                        <div>
                                                            <div class="_abfr"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="_ac2v" style="opacity: 1;">
                                    <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9o _abcm">
                                        <div class="_ac2w">
                                            <div class="_ac2p">
                                                
                                                <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abb2 _abbk _abcm">
                                                    
                                                <div class="">
                                                <!-- <form style=" display:flex!important; justify-content:center!important;" class=" start-0"action="" method="POST" enctype="multipart/form-data">
                                                            <div class="form-floating mb-3">
                                                                <p>Your Image:</p>
                                                                <input style="width:100%" type="file" name="picture">
                                                                <button class="btn btn-secondary rounded-pill btn-sm mt-1" name="push" id="submitButton" type="submit">Upload Image</button>
                                                            </div>
                                                            </form> -->
                                                    <div aria-labelledby="f7d1383677107c f1655a3eb13c0dc f23b151e739a138 f3f5bef957e0ec4"
                                                            class="_ab8w  _ab94 _ab97 _ab9f _ab9k _ab9p _abcm">
                                                            
                                                            <div
                                                                class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p  _abbj _abcm">
                                                                <!-- File input-->
                  
                  
                  <!-- <span class="success" id="success">
                    <span>Image set!</span>
                  </span> -->
                                                                
                                                                <span class="_aa8h" role="link" tabindex="-1"
                                                                    style="width: 28px; height: 28px;">
                                                                    
                                                                    
                                                                    <img
                                                                        alt="veaci_vlas's profile picture" class="_aa8j"
                                                                        crossorigin="anonymous" draggable="false"
                                                                        src="<?php echo''.URLROOT.'/public/img/account.jpg'?>"></span>
                                                            </div>
                                                            <div class="_ab8w  _ab94 _ab99 _ab9h _ab9m _ab9o _abcm">
                                                                <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm"
                                                                    id="f1655a3eb13c0dc">
                                                                    <div class="_aacl _aaco _aacu _aacx _aada">
                                                                        <div class="_aacl _aacp _aacw _aacx _aad6">
                                                                            <?php echo''.$_SESSION["username"].'' ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm">
                                                    <div class="_ab8w  _ab94 _ab99 _ab9f _ab9m _ab9p _abcm">
                                                    <form  method="post" action="" enctype="multipart/form-data">
                                                    <input class='form-control' type="file" name="picture" id="picture" /></label><img id='pic_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px" />

                                                    <input class="hiddenInput" type="text" name="publication_id" value="<?php echo isset($data->publication_id)?$data->publication_id:'' ?>">
                                                    <div><textarea rows="4"
                                                            aria-label="Write a caption..."
                                                            name="caption"
                                                            placeholder="Write a caption..." class="_ablz _aaeg"
                                                            autocomplete="off" autocorrect="off"
                                                            style="margin-top: 24px !important;"></textarea></div>
                                                    <button class="_acan _acao _acas" style="font-size: 20px;" name="action" value="Submit Post"type="submit">Publish</button>
                                                        </form>    
                                                        </div>
                                                    <div class=" _ab8z  _ab94 _ab99 _ab9f _ab9m _ab9p  _ab9w _abcm">
                                                        <div class="_aafc" role="button" tabindex="-1">
                                                            <div class="_aacl _aacp _aacu _aacx _aad6"></div>
                                                        </div>
                                                    </div>
                                                    <div class="_aag3">
                                                        <div
                                                            class="_ab8w  _ab94 _ab95 _ab9f _ab9m _ab9o  _ab9y _aba7 _abcm">
                                                            
                                                            <div class="" style="top: 5px; left: 0px;"></div>
                                                        </div>
                                                       
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>

<?php require  APPROOT . '/views/includes/footer.php'?>