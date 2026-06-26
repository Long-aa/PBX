<?php
global $amp_conf;
$html = '';
$version	 = get_framework_version();
$version = $version ? $version : getversion();
$version_tag = '?load_version=' . urlencode($version);
if ($amp_conf['FORCE_JS_CSS_IMG_DOWNLOAD']) {
  $this_time_append	= '.' . time();
  $version_tag 		.= $this_time_append;
} else {
	$this_time_append = '';
}

$baseUrl = isset($baseUrl) ? $baseUrl : "";

// Brandable logos in footer
$html .= '<div class="col-md-12 text-center" id="footer_logo_wrapper" style="text-align: center; padding: 10px 0;">
	<a target="_blank" href="https://xenoai.vn/">'
    . '<img id="footer_logo1" src="https://xenoai.vn/images/logo3.svg" alt="XenoAI" style="height: 32px; width: auto; display: inline-block;" />'
	. '</a>';

//module license
if (!empty($active_modules[$module_name]['license'])) {
  $html .= br() . sprintf(_('Current module licensed under %s'),
  trim($active_modules[$module_name]['license']));
}

//benchmarking
if (isset($amp_conf['DEVEL']) && $amp_conf['DEVEL']) {
	$benchmark_time = number_format(microtime_float() - $benchmark_starttime, 4);
	$html .= '<br><span id="benchmark_time">Page loaded in ' . $benchmark_time . 's</span>';
}
$html .= '</div>';
echo $html;
?>
