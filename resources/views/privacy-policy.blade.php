@extends('layouts.master')

@section('og_tags')
<title>Privacy Policy</title>
<meta property="og:title" content="Privacy Policy" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:description" content="A memory keeper to save those beautiful memories which you never want to forget.">
<meta property="og:image" content="/assets/img/logo.svg">
<meta property="og:type" content="website" />
@endsection

@section('content')

<style>
    .navbar {
        background: #611f6a !important;
    }
</style>

<div class="container">
    @include('partials.header')
    <div class="container">
        <h1 class="display-5">Privacy Policy</h1>
        <p class="text-dark">Last Updated: 1st January, 2020</p>
        <div class="data-container">
			<h4 class="title">Personal identification information</h4>
			<div class="text">
				<p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, buy insurance, subscribe to the newsletter, respond to a survey, file claim, ask for changes in the policy document or cancel policy. Users may be asked for, as appropriate, name, email address, mailing address, phone number, payment-related information. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain insurance related activities.
				</p>
			</div>
			<h4 class="title">Non-personal identification information</h4>
			<div class="text">
				<p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to the Site, such as the operating system and the Internet service providers utilised and other similar information.</p>
			</div>
			<h4 class="title">Web browser cookies</h4>
			<div class="text">
				<p>Our Site uses “cookies” to enhance User experience. User’s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If you do so, note that some parts of the Site may not function properly.</p>
			</div>
			<h4 class="title">How we use collected information</h4>
			<div class="text">
				<p>We may use personal information for the following purposes:</p>
				<ul>
					<li>To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently.</li>
					<li>To personalise user experience: We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</li>
					<li>To improve our Site: We may use feedback you provide to improve our products and services</li>
					<li>To process payments: We may use the information Users provide about themselves when buying a policy only to provide service for that policy. We do not share this information with outside parties except to the extent necessary to provide a great service.</li>
					<li>To share some information (other than your personal information like your name, address, email address or telephone number) with third-party advertising companies and/or ad agencies to serve ads as appropriate.</li>
					<li>To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them.</li>
					<li>To send periodic emails</li>
					<li>We may use the email address to send User information and updates pertaining to their policies. It may also be used to respond to their inquiries, questions, and/or other requests.</li>
					<li>If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email or User may contact us via our Site.</li>
				</ul>
			</div>
			<h4 class="title">How we protect your information</h4>
			<div class="text">
				<p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorised access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>
				<p>Sensitive and private data exchange between the Site and its Users happens over a SSL secured communication channel and is encrypted and protected with digital signatures.
				</p>
			</div>
			<h4 class="title">Sharing your personal information</h4>
			<div class="text">
				<p>We may use third party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.</p>
			</div>
			<h4 class="title">Third party websites</h4>
			<div class="text">
				<p>Users may find content on our Site that links to the sites and services of insurance companies which may appear on our Site for online sale of insurance. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website’s own terms and policies.</p>
			</div>
			<h4 class="title">Changes to this privacy policy</h4>
			<div class="text">
				<p>Toffee will update this privacy policy from time to time. When we do, we will revise the updated date at the top of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>
			</div>
			<h4 class="title">Your acceptance of these terms</h4>
			<div class="text">
				<p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>
			</div>
		</div>
    </div>
    @include('partials.footer')
</div>

@endsection