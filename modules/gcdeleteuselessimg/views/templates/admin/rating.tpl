{*
* GcDeleteUselessImg
*
* @category  Prestashop
* @category  Module
* @author    Grégory Chartier <hello@gregorychartier.fr>
* @copyright 2020 Grégory Chartier (https://www.gregorychartier.fr)
* @license   Commercial license see license.txt
*}

<script type='text/javascript'>
    $(document).ready(function () {
        $('div#stop_rating p.stop a').click(function () {
            $('div#stop_rating').hide(500);
            $.ajax({
				type :'GET',
				url : window.location+'&stop_rating=1'
			});
            return false;
        });
    });
</script>
<div id="stop_rating" class="row text-center">
	<div style="margin-top: 20px; margin-bottom: 20px; padding: 0 .7em; text-align: center;">
		<p class="invite">
			{l s='You are satisfied with our module and want to encourage us to add new features ?' mod='gcdeleteuselessimg'}
			<br/>
			<a href="http://addons.prestashop.com/ratings.php" target="_blank">
				<strong>
					{l s='Please rate it on Prestashop Addons, and give us 5 stars !' mod='gcdeleteuselessimg'}
				</strong>
			</a>
		</p>
		<p class="stop" style="display: block;">
			<a style="cursor: pointer">
				[{l s='No thanks, I don\'t want to help you. Close this dialog.' mod='gcdeleteuselessimg'}]
			</a>
		</p>
	</div>
</div>