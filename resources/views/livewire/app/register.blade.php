<div>
    <div class="auth-page">
        <div class="container page">
            <div class="row">

                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign up</h1>
                    <p class="text-xs-center">
                        <a href="{{ route('app.login') }}">Have an account?</a>
                    </p>

                    <x-validation-errors />

                    <form wire:submit.prevent='register'>
                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Your Name"
                                wire:model="credentials.name" autofocus>
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="email" placeholder="Email"
                                wire:model='credentials.email'>
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="password" placeholder="Password"
                                wire:model='credentials.password'>
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="password" placeholder="Re-enter password"
                                wire:model='credentials.password_confirmation'>
                        </fieldset>
                        <button class="btn btn-lg btn-primary pull-xs-right">
                            Sign up
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
