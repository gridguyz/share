<?php
namespace Grid\Share\View\Helper\Button;

use Zend\View\Helper\AbstractHelper;

/**
 * Share button viewHelper
 *
 * @author Kristof Matos <kristof.matos@megaweb.hu>
 */
class Facebook extends AbstractHelper implements ButtonInterface
{
   /**
     * Renders button html
     *
     * @param string $url
     * @param string $locale
     * @return string
     */
    public function getHtml( $url, $locale )
    {
        $url = htmlspecialchars($url);
        return <<<SCRIPT
<div data-locale="$locale"
     data-js-type="js.facebook.xfbml"
     class="fb-like"
     data-href="$url"
     data-send="false"
     data-width="100"
     data-layout="button_count"
     data-show-faces="false"
     data-share="false"></div>
SCRIPT;
    }

}
