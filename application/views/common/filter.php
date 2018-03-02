<style type="text/css">
    .filter-item {
        padding-top: 6px;
        padding-bottom: 6px;
    }
</style>
<div class="navbar navbar-default navbar-xs navbar-component">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-filter">
        <p class="navbar-text">Filter:</p>
        <ul class="nav navbar-nav">
            <li class="filter-item">
                <form action="#">
                    <div style="margin-top:3px;" class="has-feedback has-feedback-left">
                        <input class="form-control" placeholder="Search" type="search" id="search" name="search">
                        <div class="form-control-feedback">
                            <i class="icon-search4 text-size-base text-muted"></i>
                        </div>
                    </div>
                </form>
            </li>
           


        </ul>

        <div class="navbar-right">
            <p class="navbar-text">View mode:</p>
            <form class="navbar-form navbar-left" action="#">
                <div class="form-group">
                    <label class="checkbox-inline switchery-double checkbox-switchery switchery-xs">
                        List
                        <input class=" " checked="checked" style="display: none;" data-switchery="true" type="checkbox"><span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: 0px 0px 0px 8px rgb(100, 189, 99) inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 14px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                        Grid
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
