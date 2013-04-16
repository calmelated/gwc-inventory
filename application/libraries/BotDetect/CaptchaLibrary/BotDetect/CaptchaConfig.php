<?php

$LBD_CaptchaConfig = new stdClass();

// Captcha code configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->CodeLength = 5;
$LBD_CaptchaConfig->CodeStyle = CodeStyle::Alphanumeric;
$LBD_CaptchaConfig->CodeTimeout = 1200;
$LBD_CaptchaConfig->Locale = 'en-US';
$LBD_CaptchaConfig->CustomCharset = '';
$LBD_CaptchaConfig->BannedSequences = '';

// Captcha image configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->ImageStyle = CaptchaRandomization::GetRandomImageStyle();
$LBD_CaptchaConfig->ImageWidth = 250;
$LBD_CaptchaConfig->ImageHeight = 50;
$LBD_CaptchaConfig->ImageFormat = ImageFormat::Jpeg;
$LBD_CaptchaConfig->CustomDarkColor = '';
$LBD_CaptchaConfig->CustomLightColor = '';
$LBD_CaptchaConfig->ImageTooltip = 'CAPTCHA';

// Captcha sound configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->SoundEnabled = true;
$LBD_CaptchaConfig->SoundStyle = CaptchaRandomization::GetRandomSoundStyle();
$LBD_CaptchaConfig->SoundFormat = SoundFormat::WavPcm16bit8kHzMono;
$LBD_CaptchaConfig->SoundTooltip = 'Speak the CAPTCHA code';
$LBD_CaptchaConfig->WarnAboutMissingSoundPackages = true;
$LBD_CaptchaConfig->SoundStartDelay = 0;

// Captcha reload configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->ReloadEnabled = true;
$LBD_CaptchaConfig->ReloadTooltip = 'Reload the CAPTCHA code';
$LBD_CaptchaConfig->AutoReloadExpiredCaptchas = true;
$LBD_CaptchaConfig->AutoReloadTimeout = 7200;

// Captcha help link configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->HelpLinkEnabled = true;
$LBD_CaptchaConfig->HelpLinkMode = HelpLinkMode::Text;
$LBD_CaptchaConfig->HelpLinkUrl = 'http://captcha.biz/captcha.html';
$LBD_CaptchaConfig->HelpLinkText = '';

// Captcha user input configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->AutoFocusInput = true;
$LBD_CaptchaConfig->AutoClearInput = true;
$LBD_CaptchaConfig->AutoUppercaseInput = true;

// Captcha URL configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->HandlerUrl = 'BotDetect.php';
$LBD_CaptchaConfig->ReloadIconUrl = LBD_URL_ROOT . 'LBD_ReloadIcon.gif';
$LBD_CaptchaConfig->SoundIconUrl = LBD_URL_ROOT . 'LBD_SoundIcon.gif';
$LBD_CaptchaConfig->LayoutStylesheetUrl = LBD_URL_ROOT . 'LBD_Layout.css';
$LBD_CaptchaConfig->ScriptIncludeUrl = LBD_URL_ROOT . 'LBD_Scripts.js';

// Captcha persistence configuration
// ---------------------------------------------------------------------------
$LBD_CaptchaConfig->SaveFunctionName = 'PHP_Session_Save';
$LBD_CaptchaConfig->LoadFunctionName = 'PHP_Session_Load';
$LBD_CaptchaConfig->ClearFunctionName = 'PHP_Session_Clear';

CaptchaConfiguration::SaveSettings($LBD_CaptchaConfig);

?>