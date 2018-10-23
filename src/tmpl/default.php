<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest_images
 *
 * @author     Sebastian Brümmer <sebastian@produktivbuero.de>
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

?>
<ul class="latest-image-news<?php echo $moduleclass_sfx; ?>">

<?php foreach ($list as $item) : ?>

	<li itemscope itemtype="https://schema.org/Article">
    <?php if ( $params->get('show_title', 1) ) : ?>
      <?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $item); ?>
    <?php endif; ?>

    <?php if ( $params->get('show_date', 0) || $params->get('show_category', 0) ) : ?>
      <dl class="article-info muted">
        <?php if ( $params->get('show_author', 0) ) : ?>
          <dd class="createdby" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <?php $author = ($item->created_by_alias ?: $item->author); ?>
            <?php $author = '<span itemprop="name">' . $author . '</span>'; ?>
            <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
          </dd>
        <?php endif; ?>
      
        <?php if ( $params->get('show_category', 0) ) : ?>
          <dd class="category-name">
            <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)); ?>">
              <span itemprop="genre">
                <?php echo $item->category_title; ?>
              </span>
            </a>
          </dd>
        <?php endif; ?>

        <?php if ( $params->get('show_date', 0) ) : ?>
          <dd class="create">
            <span class="icon-calendar" aria-hidden="true"></span>
            <time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">
              <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'))); ?>
            </time>
          </dd>
        <?php endif; ?>
      </dl>
    <?php endif; ?>

    <?php if ( $params->get('show_readmore', 0) ) : ?>
      <?php echo JLayoutHelper::render('joomla.content.readmore', array('item' => $item, 'params' => $item->params, 'link' => $item->link)); ?>
    <?php endif; ?>

    <?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
    
    <?php if ( $params->get('show_introtext', 0) ) : ?>
      <?php echo $item->intro; ?>
    <?php endif; ?>
	</li>

<?php endforeach; ?>

</ul>
