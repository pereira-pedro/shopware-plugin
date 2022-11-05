{extends file="parent:frontend/detail/buy.tpl"}

{* If the text is empty, do nothing.*}
{if $ixoraTextContent}
    {block name="frontend_detail_buy_configurator_inputs"}
        {* Define text style*}
        <style>
            .extra-text-box {
                width: 100%;
                text-align: center;
            }

            .extra-text {
                {if $ixoraTextFontSize}font-style:italic;{/if}
                font-size:{$ixoraTextFontSize}px;
                margin-left: 1.25em;
            }
        </style>

        {* render the extra text *}
        <div class="extra-text-box">
            <span class="extra-text">{$ixoraTextContent}</span>
        </div>

        {* render block from parent *}
        {$smarty.block.parent}
    {/block}
{/if}