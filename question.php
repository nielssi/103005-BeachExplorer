<?php
	function checkEmail($email) {
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		return $email;
  	}
?>
<div id="updates">
    <div class="toolbar">
        <h1>Ihre Nachricht <?php echo $email;?></h1>
        <a class="back" href="#<?php if($email != false){echo "home";}?>">zur&uuml;ck</a>
    </div>
    <div>
        <ul class="rounded">
<?php
        if( checkEmail($_POST['email']) == false )
		{
			echo "<li>Email wurde nicht versandt! &Uuml;berpr&uuml;fen Sie Ihre Email-Adresse. </li>";
		}else{
			$empfaenger = 'sievertsenniels@googlemail.com';
    		$topic = 'Frage zu BeachExplorer Public 1.0.3 von '.$_POST['email'];
    		$message = $_POST['email'] .' sagt: '. $_POST['msg'];
    		$header = 'From: BeachExplorer Public 1.0.3,'. "\n";

    		mail($empfaenger, $topic, $message, $header);
    		echo "<li>Email wurde versandt! Wir werden uns so schnell wie m&ouml;glich um die Beantwortung k&uuml;mmern. </li>";
		}
?>
        </ul>
    </div>
</div>