<?php

class CaptchaAction extends FrontendAction {

    public function _empty() {
		$captcha = new Captcha();
		$captcha->CreateImage();
    }
}