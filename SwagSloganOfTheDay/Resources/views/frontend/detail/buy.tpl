{extends file="parent:frontend/detail/buy.tpl"}

{block name="frontend_detail_buy_configurator_inputs"}
    <style>
        .slogan-box {
            width:100%;
            text-align:center;
        }
        .slogan {
            {if $italic}font-style:italic;{/if}
            font-size:{$swagSloganFontSize}px;
        }
    </style>


    <div class="slogan-box">
        <span class="slogan">{$swagSloganContent}</span>
    </div>

    {$smarty.block.parent}
{/block}