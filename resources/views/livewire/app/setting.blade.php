<div>
    <div class="settings-page">
        <div class="container page">
            <div class="row">

                <div class="col-md-6 offset-md-3 col-xs-12">
                    <x-validation-errors />

                    <h1 class="text-xs-center">Your Settings</h1>

                    <form wire:submit.prevent='saveSetting'>
                        <fieldset>
                            <fieldset class="form-group">
                                <input wire:model='user.image' class="form-control" type="text"
                                    placeholder="URL of profile picture">
                            </fieldset>
                            <fieldset class="form-group">
                                <input wire:model='user.name' class="form-control form-control-lg" type="text"
                                    placeholder="Your Name">
                            </fieldset>
                            <fieldset class="form-group">
                                <textarea wire:model='user.bio' class="form-control form-control-lg" rows="8"
                                    placeholder="Short bio about you"></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <input wire:model='user.email' class="form-control form-control-lg" type="text"
                                    placeholder="Email">
                            </fieldset>
                            <fieldset class="form-group">
                                <input wire:model='user.password' class="form-control form-control-lg" type="password"
                                    placeholder="Password">
                            </fieldset>
                            <button class="btn btn-lg btn-primary pull-xs-right">
                                Update Settings
                            </button>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
