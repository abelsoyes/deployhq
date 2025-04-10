{*
* GcDeleteUselessImg
*
* @category  Prestashop
* @category  Module
* @author    Grégory Chartier <hello@gregorychartier.fr>
* @copyright 2020 Grégory Chartier (https://www.gregorychartier.fr)
* @license   Commercial license see license.txt
*}

<div class="panel">
    <div class="panel-heading"><i class="icon-cogs"></i>{l s='Cron task' mod='gcdeleteuselessimg'}</div>
    <p>{l s='Cron task url to delete useless img' mod='gcdeleteuselessimg'}: <a href="{$base_url|escape:'htmlall':'UTF-8'}">{$base_url|escape:'htmlall':'UTF-8'}</a></p>
    <p>{l s='Cron task url to delete disabled products img' mod='gcdeleteuselessimg'}: <a href="{$base_url|escape:'htmlall':'UTF-8'}&_d=1">{$base_url|escape:'htmlall':'UTF-8'}&_d=1</a></p>
    <p>{l s='Cron task url to delete unavailalbe products img formats' mod='gcdeleteuselessimg'}: <a href="{$base_url|escape:'htmlall':'UTF-8'}&_t=1">{$base_url|escape:'htmlall':'UTF-8'}&_t=1</a></p>
</div>