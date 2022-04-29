<div>


    {if !isset($operatingSystems)}

    <form method="post" action="#">
        <select class=btn btn-default dropdown-toggle stylebackground: #b4dbed;font-size: 20px name=region
                id=inlineFormCustomSelect>
            {foreach $regions as $region}
                <option class=none value={$region}> {$region}</option>
            {/foreach}
        </select>
        <input name="step1" type="submit" value="next" style="width: 100px;font-size: larger">
    </form>
</div>
{/if}


{if isset($operatingSystems)}
    <label>Choose Hard Disk</label>
    <form method="post" action="#">
        <ul>
            {foreach $operatingSystems as $os}
                <li>{$os}</li>
                <label>
                    <input name="HDD" type="radio" value="{$os}">
                </label>
            {/foreach}
        </ul>
        <input name="step2" type="submit" value="Next">
    </form>
{/if}

<h

