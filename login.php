<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
    </head>
    

    <body>
        <div class="login-wrapper">
            <div class="login-side">
                <a href="#" title="Logo">
                    <img class="logo" src="imgs/System/login/logo.png" alt="Logo">
                </a>
                <div class="my-form__wrapper">
                    <div class="login-welcome-row">
                        <h1>Welcome back &#x1F44F;</h1>
                        <p>Please enter your details!</p>
                    </div>
                    <form class="my-form">
                        <div class="socials-row">
                            <a
                                href="#"
                                title="Use Google"
                            >
                                <img src="imgs/System/login/google.png" alt="Google">
                                Log in with Google
                            </a>
                            <a
                                href="#"
                                title="Use Apple"
                            >
                                <img src="imgs/System/login/apple.png" alt="Apple">
                                Log in with Apple
                            </a>
                        </div>
                        <div class="divider">
                            <div class="divider-line"></div>
                            Or
                            <div class="divider-line"></div>
                        </div>
                        <div class="text-field">
                        <div class="err none">
                            <p>messsage</p>
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18 6l-12 12"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                    
                            </div>
                            <label for="email">Email:</label>
                            <input
                                type="text"
                                id="email"
                                name="email"
                                placeholder="Your Email"
                                
                            >
                            <img
                                alt="Email Icon"
                                title="Email Icon"
                                src="imgs/System/login/email.svg"
                            >
                        </div>
                        <div class="text-field">
                            <label for="password">Password:</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Your Password"
                                title="Minimum 6 characters at 
                                    least 1 Alphabet and 1 Number"

                            >
                            <img
                                alt="Password Icon"
                                title="Password Icon"
                                src="imgs/System/login/password.svg"
                            >
                        </div>
                        <input type="submit" class="my-form__button" value="Login">
                        <div class="my-form__actions">
                            <div class="my-form__row">
                                <span>Did you forget your password?</span>
                                <a href="#" title="Reset Password">
                                    Reset Password
                                </a>
                            </div>
                            <div class="my-form__signup">
                                <a href="create_compte.html" title="Create Account">
                                    Create Account
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="info-side">
                <img src="imgs/System/login/mock.png" alt="Mock" class="mockup">
                <div class="welcome-message">
                    <h2>Navitron Maps! 👋</h2>
                    <p>
                       Your ultimate guide to navigating the world 
                       and discovering new places with ease.
                    </p>    
                </div>
            </div>
        </div>
        <script src="Js Global/login.js"></script>
    </body>
</html>

