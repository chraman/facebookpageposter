<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '723871087684016',
		'secret' => 'd2c968dbddfa3089eb410739346a83cb'
	));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Facebook PHP</title>
</head>
<body>
<?
	$user = $facebook->getUser();
	if ($user): 
		$user_graph = $facebook->api('/me');
		$user_graph_page = $facebook->api('me?fields=accounts');
		echo '<h1>Hello ',$user_graph['first_name'],'</h1>';
		echo '<p>Your birthday is: ',$user_graph['birthday'],'</p>';
		echo '<p>Your User ID is: ', $user, '</p>';
		if ($user_graph_page['accounts']):
			echo '<h2>Facebook pages to post</h2>';
			echo '<form action="posted.php" method="post">';
			foreach ($user_graph_page['accounts']['data'] as $key => $value) {
				echo '<input type="checkbox" name="page[]" value="'.$value['id'].'" /> Name : ',$value['name'],', Page Id :'.$value['id'].'.</br>';
			}
			echo 'Message : <input type="textarea" name="message" rows="5" cols="40" /></br>';
			echo 'Link : <input type="textarea" name="link" rows="5" cols="40" /> </br>';
			echo '<p>Select after what days, hours and minutes you want to post. </p>';
			echo 'Days : <select name="days"><option value="0" selected="1">0</option><option value="1">1</option>
						 <option value="2">2</option><option value="3">3</option><option value="4">4</option>
						 <option value="5">5</option><option value="6">6</option><option value="7">7</option>
						 <option value="8">8</option><option value="9">9</option><option value="10">10</option></select> ';
			echo 'Hours : <select name="hours"><option value="0" selected="1">0</option><option value="1">1</option>
						  <option value="2">2</option><option value="3">3</option><option value="4">4</option>
						  <option value="5">5</option><option value="6">6</option><option value="7">7</option>
						  <option value="8">8</option><option value="9">9</option><option value="10">10</option>
						  <option value="11">11</option><option value="12">12</option><option value="13">13</option>
						  <option value="14">14</option><option value="15">15</option><option value="16">16</option>
						  <option value="17">17</option><option value="18">18</option><option value="19">19</option>
						  <option value="20">20</option><option value="21">21</option><option value="22">22</option>
						  <option value="23">23</option><option value="24">24</option></select>';
			echo 'Munites : <select name="mins"><option value="0" selected="1">0</option><option value="1">1</option>
						  <option value="2">2</option><option value="3">3</option><option value="4">4</option>
						  <option value="5">5</option><option value="6">6</option><option value="7">7</option>
						  <option value="8">8</option><option value="9">9</option><option value="10">10</option>
						  <option value="11">11</option><option value="12">12</option><option value="13">13</option>
						  <option value="14">14</option><option value="15">15</option><option value="16">16</option>
						  <option value="17">17</option><option value="18">18</option><option value="19">19</option>
						  <option value="20">20</option><option value="21">21</option><option value="22">22</option>
						  <option value="23">23</option><option value="24">24</option><option value="25">25</option>
						  <option value="26">26</option>
						  <option value="27">27</option><option value="28">28</option><option value="29">29</option>
						  <option value="30">30</option><option value="31">31</option><option value="32">32</option>
						  <option value="33">33</option><option value="34">34</option><option value="35">35</option>
						  <option value="36">36</option><option value="37">37</option><option value="38">38</option>
						  <option value="39">39</option><option value="40">40</option><option value="41">41</option>
						  <option value="42">42</option><option value="43">43</option><option value="44">44</option>
						  <option value="45">45</option><option value="46">46</option><option value="47">47</option>
						  <option value="48">48</option><option value="49">49</option><option value="50">50</option>
						  <option value="51">51</option>
						  <option value="52">52</option><option value="53">53</option><option value="54">54</option>
						  <option value="55">55</option><option value="56">56</option><option value="57">57</option>
						  <option value="58">58</option><option value="59">59</option><option value="60">60</option></select></br>';
			echo '<input type="submit" value="POST"></br>';
			echo '</form>';
		
		endif;
		echo '<p><a href="logout.php">logout</a></p>';
	    else: 
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'scope'=>'email',
			'redirect_uri' => 'http://apps.facebook.com/swift_page_poster'
		));
		echo '<p><a href="', $loginUrl, '" target="_top">login</a></p>';
	endif; 
	echo '<p><a href="insta.php">insta</a></p>';
?>
</body>
</html>