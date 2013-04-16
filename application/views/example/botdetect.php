<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CodeIgniter Basic BotDetect CAPTCHA Sample</title>
  <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />
  <link type="text/css" rel="Stylesheet" href="<?php echo base_url(); ?>css/style.css" />
</head>
<body>

<div id="container">
  <h1>CodeIgniter Basic BotDetect CAPTCHA Sample</h1>

  <div id="body">
    <?php echo form_open('botdetect/sample'); ?>
    
    <label for="CaptchaCode">Please retype the characters from the image:</label>
    <?php echo $captchaHtml; ?>
    <input type="text" name="CaptchaCode" id="CaptchaCode" value="" size="50" />
    
    <div><input type="submit" value="Submit" /></div>
    <?php echo $captchaValidationMessage; ?>

    </form>
  </div>
</div>
<div id="sampleNavigation">
  <h1>BotDetect CAPTCHA CodeIgniter Samples</h1>
  <ul>
    <li><?php echo anchor('botdetect/sample', 'Basic CAPTCHA Sample'); ?></li>
    <li><?php echo anchor('botdetect/contact', 'Form Validation CAPTCHA Sample'); ?></li>
  </ul>
</div>

</body>
</html>