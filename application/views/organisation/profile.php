			<?php //echo '<pre>';print_r($user); echo '</pre>';  ?>
			<div class="row">
				<div class="col-md-3">
					<?php $picture = $this->session->userdata('picture'); ?>
					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img style="width: 100px;height: 100px;" class="profile-user-img img-responsive img-circle" src="<?php echo (!empty($picture) ? base_url($picture) : base_url("siteassets/images/no_image.png")) ?>" alt="User profile picture">

							<h3 class="profile-username text-center"><?php echo $user->firstname ?></h3>

							<p class="text-muted text-center"><?php //echo $user->specialist ?></p>

							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<b>Email id</b> -<?php echo $user->email ?>
								</li>
								<li class="list-group-item">
									<b>Mobile No.</b> -<?php echo $user->mobile ?>
								</li>
							</ul>

							<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->

					<!-- About Me Box -->
					<?php /* <div class="box box-primary">
			 <div class="box-header with-border">
				 <h3 class="box-title">About Me</h3>
			 </div>
			 < ! -- /.box-header - - >
			 <div class="box-body">
				 <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
				 <p class="text-muted">
					 <?php echo $user->short_biography ?>
				 </p>
				 <hr>

				 <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

				 <p class="text-muted"><?php echo $user->address ?></p>

				 <hr>

				 <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

				 <p><?php echo $user->specialist ?>
					 <!--<span class="label label-danger">UI Design</span>
					 <span class="label label-success">Coding</span>
					 <span class="label label-info">Javascript</span>
					 <span class="label label-warning">PHP</span>
					 <span class="label label-primary">Node.js</span>-->
				 </p>

	 <!--
				 <hr>
				 <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
	 -->
			 </div>
			 <!-- /.box-body -->
		 </div>
		 <!-- /.box --> */?>
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<!--<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
							<li><a href="#timeline" data-toggle="tab">Timeline</a></li>-->
							<li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="<?php echo base_url('assetslte/'); ?>dist/img/user1-128x128.jpg" alt="user image">
												<span class="username">
													<a href="#">Jonathan Burke Jr.</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
										<span class="description">Shared publicly - 7:30 PM today</span>
									</div>
									<!-- /.user-block -->
									<p>
										Lorem ipsum represents a long-held tradition for designers,
										typographers and the like. Some people hate it and argue for
										its demise, but others ignore the hate as they create awesome
										tools to help create filler text for everyone from bacon lovers
										to Charlie Sheen fans.
									</p>
									<ul class="list-inline">
										<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
										<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
										</li>
										<li class="pull-right">
											<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
												(5)</a></li>
									</ul>

									<input class="form-control input-sm" type="text" placeholder="Type a comment">
								</div>
								<!-- /.post -->

								<!-- Post -->
								<div class="post clearfix">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="<?php echo base_url('assetslte/'); ?>dist/img/user7-128x128.jpg" alt="User Image">
												<span class="username">
													<a href="#">Sarah Ross</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
										<span class="description">Sent you a message - 3 days ago</span>
									</div>
									<!-- /.user-block -->
									<p>
										Lorem ipsum represents a long-held tradition for designers,
										typographers and the like. Some people hate it and argue for
										its demise, but others ignore the hate as they create awesome
										tools to help create filler text for everyone from bacon lovers
										to Charlie Sheen fans.
									</p>

									<form class="form-horizontal">
										<div class="form-group margin-bottom-none">
											<div class="col-sm-9">
												<input class="form-control input-sm" placeholder="Response">
											</div>
											<div class="col-sm-3">
												<button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.post -->

								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="<?php echo base_url('assetslte/'); ?>dist/img/user6-128x128.jpg" alt="User Image">
												<span class="username">
													<a href="#">Adam Jones</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
										<span class="description">Posted 5 photos - 5 days ago</span>
									</div>
									<!-- /.user-block -->
									<div class="row margin-bottom">
										<div class="col-sm-6">
											<img class="img-responsive" src="<?php echo base_url('assetslte/'); ?>dist/img/photo1.png" alt="Photo">
										</div>
										<!-- /.col -->
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-6">
													<img class="img-responsive" src="<?php echo base_url('assetslte/'); ?>dist/img/photo2.png" alt="Photo">
													<br>
													<img class="img-responsive" src="<?php echo base_url('assetslte/'); ?>dist/img/photo3.jpg" alt="Photo">
												</div>
												<!-- /.col -->
												<div class="col-sm-6">
													<img class="img-responsive" src="<?php echo base_url('assetslte/'); ?>dist/img/photo4.jpg" alt="Photo">
													<br>
													<img class="img-responsive" src="<?php echo base_url('assetslte/'); ?>dist/img/photo1.png" alt="Photo">
												</div>
												<!-- /.col -->
											</div>
											<!-- /.row -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->

									<ul class="list-inline">
										<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
										<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
										</li>
										<li class="pull-right">
											<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
												(5)</a></li>
									</ul>

									<input class="form-control input-sm" type="text" placeholder="Type a comment">
								</div>
								<!-- /.post -->
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="timeline">
								<!-- The timeline -->
								<ul class="timeline timeline-inverse">
									<!-- timeline time label -->
									<li class="time-label">
												<span class="bg-red">
													10 Feb. 2014
												</span>
									</li>
									<!-- /.timeline-label -->
									<!-- timeline item -->
									<li>
										<i class="fa fa-envelope bg-blue"></i>

										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

											<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

											<div class="timeline-body">
												Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
												weebly ning heekya handango imeem plugg dopplr jibjab, movity
												jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
												quora plaxo ideeli hulu weebly balihoo...
											</div>
											<div class="timeline-footer">
												<a class="btn btn-primary btn-xs">Read more</a>
												<a class="btn btn-danger btn-xs">Delete</a>
											</div>
										</div>
									</li>
									<!-- END timeline item -->
									<!-- timeline item -->
									<li>
										<i class="fa fa-user bg-aqua"></i>

										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

											<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
											</h3>
										</div>
									</li>
									<!-- END timeline item -->
									<!-- timeline item -->
									<li>
										<i class="fa fa-comments bg-yellow"></i>

										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

											<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

											<div class="timeline-body">
												Take me to your leader!
												Switzerland is small and neutral!
												We are more like Germany, ambitious and misunderstood!
											</div>
											<div class="timeline-footer">
												<a class="btn btn-warning btn-flat btn-xs">View comment</a>
											</div>
										</div>
									</li>
									<!-- END timeline item -->
									<!-- timeline time label -->
									<li class="time-label">
												<span class="bg-green">
													3 Jan. 2014
												</span>
									</li>
									<!-- /.timeline-label -->
									<!-- timeline item -->
									<li>
										<i class="fa fa-camera bg-purple"></i>

										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

											<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

											<div class="timeline-body">
												<img src="http://placehold.it/150x100" alt="..." class="margin">
												<img src="http://placehold.it/150x100" alt="..." class="margin">
												<img src="http://placehold.it/150x100" alt="..." class="margin">
												<img src="http://placehold.it/150x100" alt="..." class="margin">
											</div>
										</div>
									</li>
									<!-- END timeline item -->
									<li>
										<i class="fa fa-clock-o bg-gray"></i>
									</li>
								</ul>
							</div>
							<!-- /.tab-pane -->

							<div class="active tab-pane" id="settings">
								<!--<form class="form-horizontal">-->
									<?php echo form_open_multipart('dashboard_org/dashboard_org/form/', 'class="form-horizontal"') ?> 

									<?php echo form_hidden('user_id', $user->user_id) ?>
									<div class="form-group"><!-- First Name -->
										<label for="firstname" class="col-sm-2 control-label"><?php echo display('first_name') ?></label>

										<div class="col-sm-10">
											<input name="firstname" type="text" class="form-control" id="firstname" placeholder="Name" value="<?php echo $user->firstname ?>">
										</div>
									</div>

									<!-- Last Name -->
									<!-- <div class="form-group">
										<label for="lastname" class="col-sm-2 control-label"><?php echo display('last_name') ?></label>

										<div class="col-sm-10">
											<input name="lastname" type="text" class="form-control" id="lastname" placeholder="Name" value="<?php echo $user->lastname ?>">
										</div>
									</div> -->

									<div class="form-group"><!-- Email Id-->
										<label for="email" class="col-sm-2 control-label"><?php echo display('email') ?></label>

										<div class="col-sm-10">
											<input name="email" type="email" class="form-control" id="email" placeholder="<?php echo display('email') ?>" value="<?php echo $user->email ?>">
										</div>
									</div>

									<div class="form-group"><!-- Password -->
										<label for="password" class="col-sm-2 control-label"><?php echo display('password') ?></label>

										<div class="col-sm-10">
											<input name="password" type="password" class="form-control" id="password" placeholder="<?php echo display('password') ?>" value="">
										</div>
									</div>

									<div class="form-group"><!-- Mobile No -->
										<label for="mobile" class="col-sm-2 control-label"><?php echo display('mobile') ?></label>
										<div class="col-sm-10">
											<input name="mobile" type="text" class="form-control" id="mobile" placeholder="<?php echo display('mobile') ?>" value="<?php echo $user->mobile ?>">
										</div>
									</div>

									<div class="form-group"> <!-- Sex -->
										<label for="sex" class="col-sm-2 control-label"><?php echo display('sex') ?></label>
										<div class="col-xs-10">
												<div class="form-check">
														<label class="radio-inline">
														<input class="flat-red" type="radio" name="sex" value="Male" <?php echo set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
														</label>
														<label class="radio-inline">
														<input type="radio" name="sex" value="Female" <?php echo set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
														</label>
														<label class="radio-inline">
														<input type="radio" name="sex" value="Other" <?php echo set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
														</label>
												</div>
										</div>
									</div>

									<!-- if employee picture is already uploaded -->
									<?php if (!empty($user->picture)) { ?>
										<div class="form-group">
												<label for="picturePreview" class="col-xs-2 control-label"></label>
												<div class="col-sm-10">
														<img src="<?php echo base_url($user->picture) ?>" alt="Picture" class="img-thumbnail" />
												</div>
										</div>
									<?php } ?>
									<div class="form-group"><!-- Picture -->
										<label for="picture" class="col-xs-2 control-label"><?php echo display('picture') ?></label>
										<div class="col-sm-10">
												<input type="file" name="picture" id="picture" value="<?php echo $user->picture ?>">
												<input type="hidden" name="old_picture" value="<?php echo $user->picture ?>">
										</div>
									</div>

									<!-- <div class="form-group ">
										<label for="address" class="col-xs-2 control-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
										<div class="col-sm-10">
											<textarea name="address" class="form-control" id="address" placeholder="<?php echo display('address') ?>" maxlength="140" rows="3"><?php echo $user->address ?></textarea>
										</div>
									</div>
									 -->
									<div class="form-group">
										<label class="col-sm-2 control-label"><?php echo display('status') ?></label>
										<div class="col-sm-10">
											<div class="form-check">
												<label class="radio-inline">
												<input type="radio" name="status" value="1" <?php echo set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
												</label>
												<label class="radio-inline">
												<input type="radio" name="status" value="0" <?php echo set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
												</label>
											</div>
										</div>
									</div>
									<!--
									<div class="form-group">
										<label for="inputName" class="col-sm-2 control-label">Name</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputName" placeholder="Name">
										</div>
									</div>
									<div class="form-group">
										<label for="inputExperience" class="col-sm-2 control-label">Experience</label>

										<div class="col-sm-10">
											<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="inputSkills" class="col-sm-2 control-label">Skills</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<div class="checkbox">
												<label>
													<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
												</label>
											</div>
										</div>
									</div> -->
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-danger">Submit</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.nav-tabs-custom -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
<script >
$(function () {
		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass   : 'iradio_flat-green'
		})
})
</script>