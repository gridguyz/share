<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Grid\Share\Controller\Paragraph'  => 'Grid\Share\Controller\ParagraphController',
            'Grid\Share\Controller\Email'      => 'Grid\Share\Controller\EmailController',
        ),
    ),
    'factory' => array(
        'Grid\Paragraph\Model\Paragraph\StructureFactory' => array(
            'adapter' => array(
                'share' => 'Grid\Share\Model\Paragraph\Structure\Share',
            ),
        ),
        'Grid\Share\Model\Service\AdapterFactory' => array(
            'dependency' => array(
                'Grid\Share\Model\Service\AdapterDefault'
            ),
            'adapter'    => array(
                'email'       => 'Grid\Share\Model\Service\Email',
                'facebook'    => 'Grid\Share\Model\Service\Facebook',
                'googleplus'  => 'Grid\Share\Model\Service\Googleplus',
                'linkedin'    => 'Grid\Share\Model\Service\Linkedin',
                'pinterest'   => 'Grid\Share\Model\Service\Pinterest',
                'reddit'      => 'Grid\Share\Model\Service\Reddit',
                'stumbleupon' => 'Grid\Share\Model\Service\Stumbleupon',
                'tumblr'      => 'Grid\Share\Model\Service\Tumblr',
                'twitter'     => 'Grid\Share\Model\Service\Twitter',
            ),
        ),
    ),
    'form' => array(
        'Grid\Share\Email' => array(
            'type'      => 'Grid\Share\Form\Email',
            'elements'  => array(
                'shareUrl' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Hidden',
                        'name' => 'shareUrl',
                    )
                ),
                'senderEmail' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Email',
                        'name'  => 'senderEmail',
                        'options'   => array(
                            'label'     => 'share.form.email.senderemail',
                            'required'  => true,
                        ),
                    ),
                ),
                'senderName' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Text',
                        'name'  => 'senderName',
                        'options'   => array(
                            'label'     => 'share.form.email.sendername',
                            'required'  => false,
                        ),
                    ),
                ),
                'recipientEmail' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Email',
                        'name'  => 'recipientEmail',
                        'options'   => array(
                            'label'     => 'share.form.email.recipientemail',
                            'required'  => true,
                        ),
                    ),
                ),
                'recipientName' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Text',
                        'name'  => 'recipientName',
                        'options'   => array(
                            'label'     => 'share.form.email.recipientname',
                            'required'  => false,
                        ),
                    ),
                ),
                'message' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Textarea',
                        'name'  => 'message',
                        'options'   => array(
                            'label'     => 'share.form.email.message',
                            'required'  => false,
                        ),
                    ),
                ),
                'captcha' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Captcha',
                        'name'  => 'captcha',
                        'options'   => array(
                            'label'     => 'share.form.email.captcha',
                            'required'  => true,
                        ),
                    ),
                ),
                'send' => array(
                    'spec' => array(
                        'type'  => 'Zork\Form\Element\Submit',
                        'name'  => 'send',
                        'attributes'    => array(
                            'value'     => 'share.form.email.submit',
                        ),
                    ),
                ),
                'cancel' => array(
                    'spec' => array(
                        'type' => 'Zork\Form\Element\Submit',
                        'name' => 'cancel',
                        'attributes' => array(
                            'value' => 'share.form.email.close'
                        ),
                    )
                )
            ),
        ),
        'Grid\Paragraph\CreateWizard\Start' => array(
            'elements'  => array(
                'type'  => array(
                    'spec'  => array(
                        'options'   => array(
                            'options'   => array(
                                'functions'     => array(
                                    'label'     => 'paragraph.type-group.functions',
                                    'order'     => 4,
                                    'options'   => array(
                                        'share' => 'paragraph.type.share',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'Grid\Paragraph\Meta\Edit' => array(
            'fieldsets' => array(
                'share' => array(
                    'spec' => array(
                        'name'      => 'share',
                        'options'   => array(
                            'label'     => 'paragraph.type.share',
                            'required'  => false,
                        ),
                        'elements'  => array(
                            'sorted' => array(
                                'spec'  => array(
                                    'type'      => 'Grid\Share\Form\Element\ShareCheckboxGroup',
                                    'name'      => 'sorted',
                                    'options'   => array(
                                        'text_domain'=> 'share',
                                        'label'      => 'paragraph.form.share.services',
                                        'value_options'   => array(
                                            'facebook'    => 'share.form.checkbox.facebook',
                                            'googleplus'  => 'share.form.checkbox.googleplus',
                                            'twitter'     => 'share.form.checkbox.twitter',
                                            'pinterest'   => 'share.form.checkbox.pinterest',
                                            'linkedin'    => 'share.form.checkbox.linkedin',
                                            'tumblr'      => 'share.form.checkbox.tumblr',
                                            'stumbleupon' => 'share.form.checkbox.stumbleupon',
                                            'reddit'      => 'share.form.checkbox.reddit',
                                            'email'       => 'share.form.checkbox.email',
                                        ),
                                    ),
                                ),

                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'Grid\Share\Paragraph' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/app/:locale/share',
                    'defaults' => array(
                        'controller' => 'Grid\Share\Controller\Paragraph',
                        'action'     => 'index',
                    ),
                ),
            ),
            'Grid\Share\Email' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/app/:locale/share/email',
                    'defaults' => array(
                        'controller' => 'Grid\Share\Controller\Email',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'translator' => array(
        'translation_file_patterns' => array(
            'share' => array(
                'type'          => 'phpArray',
                'base_dir'      => __DIR__ . '/../languages/share',
                'pattern'       => '%s.php',
                'text_domain'   => 'share',
            ),
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'shareButtons'           => 'Grid\Share\View\Helper\ShareButtons',
            'shareButtonEmail'       => 'Grid\Share\View\Helper\Button\Email',
            'shareButtonFacebook'    => 'Grid\Share\View\Helper\Button\Facebook',
            'shareButtonGoogleplus'  => 'Grid\Share\View\Helper\Button\Googleplus',
            'shareButtonLinkedin'    => 'Grid\Share\View\Helper\Button\Linkedin',
            'shareButtonPinterest'   => 'Grid\Share\View\Helper\Button\Pinterest',
            'shareButtonReddit'      => 'Grid\Share\View\Helper\Button\Reddit',
            'shareButtonStumbleupon' => 'Grid\Share\View\Helper\Button\Stumbleupon',
            'shareButtonTumblr'      => 'Grid\Share\View\Helper\Button\Tumblr',
            'shareButtonTwitter'     => 'Grid\Share\View\Helper\Button\Twitter',
            'formShareCheckboxGroup' => 'Grid\Share\Form\View\Helper\FormShareCheckboxGroup',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'grid/paragraph/render/share' => __DIR__ . '/../view/grid/paragraph/render/share.phtml',
            'grid/share/paragraph/index'  => __DIR__ . '/../view/grid/paragraph/render/share.phtml',
            'grid/share/email/index'      => __DIR__ . '/../view/grid/share/email/index.phtml',
            'grid/share/email/message'    => __DIR__ . '/../view/grid/share/email/message.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'modules'   => array(
        'Grid\Share'  => array(
            'pinterest' => array(
                'width'  => array( 'min' => '100'),
                'height' => array( 'min' => '100'),
                'scale'  => array( 'max' => '5' ),
            ),
            'facebook' => array(
                'languages' => include __DIR__ . '/facbook-languages.php'
            ),
        ),
        'Grid\Paragraph' => array(
            'customizeMapForms' => array(
                'share' => array(
                    'element' => 'general',
                ),
            ),
        ),
    ),
);