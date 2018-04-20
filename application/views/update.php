<?php $this->load->view('header');?> 


	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(http://localhost:8080/ci3-gudang/assets/images/img_bg_3.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1>Update <strong>Barang</strong></h1>	
					<h2>inputkan data secara lengkap.</h2>
				</div>
			</div>
		</div>
	</header>

	<div class="gtco-section gtco-gray-bg">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12"><form>

						<div class="row form-group">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<p><label class="sr-only" for="email">Email</label>
								<input type="text" id="email" class="form-control" placeholder="Your email address"></p>
							
								<p><label class="sr-only" for="subject">Subject</label>
								<input type="text" id="subject" class="form-control" placeholder="Your subject of this message"></p>
							
								<p><label class="sr-only" for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea></p>
								<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary">
						</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						
					</form>		
				
				</div>

			</div>
		</div>
	</div>
	
<?php $this->load->view('footer');?> 
