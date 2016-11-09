<?php

namespace Bitbull\InstagramWidget\Block\Widget;

use Bitbull\InstagramWidget\Block\Instagram as InstagramBlock;
use Bitbull\InstagramWidget\Helper\Config as InstagramConfig;

class Instagram extends InstagramBlock implements \Magento\Widget\Block\BlockInterface
{

    /**
     * @var string
     */
    protected $_template = 'Bitbull_InstagramWidget::instagram-widget.phtml';

    public function getConfig()
    {
        return [
            'token'      => parent::_getInstagramToken(),
            'userid'     => parent::_getInstagramUserId(),
            'channel'    => $this->_getInstagramChannel(),
            'num_photos' => $this->_getInstagramNumberPhotos()
        ];
    }

    protected function _getInstagramChannel()
    {
        if (!$this->hasData('instagram_channel')) {
            $this->setData('instagram_channel', $this->configHelper->getConfigParam(InstagramConfig::INSTAGRAM_CHANNEL));
        }
        return $this->getData('instagram_channel');
    }

    protected function _getInstagramNumberPhotos()
    {
        if (!$this->hasData('number_photos')) {
            $this->setData('number_photos',
                $this->configHelper->getConfigParam(
                    InstagramConfig::INSTAGRAM_NUMBER_PHOTOS
                )
            );
        }
        return $this->getData('number_photos');
    }
}