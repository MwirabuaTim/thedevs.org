<?php
// http://stackoverflow.com/questions/16851069/processing-login-with-sentry-2
public function login()
{
    try
    {
        $credentials = array(
            'email'    => Input::has('email') ? Input::get('email') : null,
            'password' => Input::has('password') ? Input::get('password') : null,
        );

        // Log the user in
        $user = Sentry::authenticate($credentials, Input::has('remember_me') and Input::get('remember_me') == 'checked');

        return View::make('site.common.message')
            ->with('title','Seja bem-vindo!')
            ->with('message','Você efetuou login com sucesso em nossa loja.');

    }
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message','O campo do e-mail é necessário.');
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
    {
        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message','O campo do senha é necessário.');
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
        $user = Sentry::getUserProvider()->findByLogin(Input::get('email'));

        Email::queue($user, 'site.users.emailActivation', 'Ativação da sua conta na Vevey');

        return View::make('site.common.message')
            ->with('title','Usuário não ativado')
            ->with('message',"O seu usuário ainda não foi ativado na nossa loja. Um novo e-mail de ativação foi enviado para $user->email, por favor verifique a sua caixa postal e clique no link que enviamos na mensagem. Verifique também se os nossos e-mails não estão indo direto para a sua caixa de SPAM.");
    }
    catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
    {
        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message','A senha fornecida para este e-mail é inválida.');
    }       
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message','Não existe usuário cadastrado com este e-mail em nossa loja.');
    }

    // Following is only needed if throttle is enabled
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
    {
        $time = $throttle->getSuspensionTime();

        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message',"Este usário está suspenso por [$time] minutes. Aguarde e tente novamente mais tarde.");
    }
    catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
    {
        return View::make('site.common.message')
            ->with('title','Erro')
            ->with('message',"Este usário está banido do nossa loja.");
    }

}


//http://maxoffsky.com/code-blog/integrating-facebook-login-into-laravel-application/
Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
        $data['image'] = Input::get('code')
        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});

?>