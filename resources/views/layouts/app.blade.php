<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'High Performance')</title>
    <style>
        /* Stile generale simile al tuo sito */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
        }

        header {
        <!DOCTYPE html>
        <html lang="en">
        <head>
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
                /* Stile generale e responsive */
                *, *:before, *:after { box-sizing: border-box; }
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
            text-transform: uppercase;
        }

        main {
            margin-top: 100px; /* spazio per header fisso */
            padding: 20px;
            max-width: 800px;
            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>@yield('title', 'High Performance')</title>

                <style>
                    /* Global responsive layout */
                    *, *:before, *:after { box-sizing: border-box; }
                    body {
                        margin: 0;
                        font-family: Inter, Arial, Helvetica, sans-serif;
                        background: #000;
                        color: #fff;
                        -webkit-font-smoothing: antialiased;
                        -moz-osx-font-smoothing: grayscale;
                        line-height: 1.4;
                    }

                    header.site-header {
                        background: #ff0000;
                        color: #fff;
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        z-index: 1000;
                        padding: 14px 12px;
                        text-align: center;
                        text-transform: uppercase;
                        font-weight: 700;
                        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
                        font-size: 18px;
                    }

                    main.site-main {
                        max-width: 1100px;
                        margin: 88px auto 40px auto; /* allow header space */
                        padding: 20px;
                    }

                    .container {
                        background: #000;
                        <!doctype html>
                        <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>@yield('title', 'High Performance')</title>

                            <style>
                                /* Global responsive layout */
                                *, *:before, *:after { box-sizing: border-box; }
                                body {
                                    margin: 0;
                                    font-family: Inter, Arial, Helvetica, sans-serif;
                                    background: #000;
                                    color: #fff;
                                    -webkit-font-smoothing: antialiased;
                                    -moz-osx-font-smoothing: grayscale;
                                    line-height: 1.4;
                                }

                                header.site-header {
                                    background: #ff0000;
                                    color: #fff;
                                    position: fixed;
                                    top: 0;
                                    left: 0;
                                    right: 0;
                                    z-index: 1000;
                                    padding: 14px 12px;
                                    text-align: center;
                                    text-transform: uppercase;
                                    font-weight: 700;
                                    box-shadow: 0 4px 10px rgba(0,0,0,0.5);
                                    font-size: 18px;
                                }

                                main.site-main {
                                    max-width: 1100px;
                                    margin: 88px auto 40px auto; /* allow header space */
                                    padding: 20px;
                                }

                                .container {
                                    background: #000;
                                    border: 2px solid #ff0000;
                                    <!doctype html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="utf-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1">
                                        <title>@yield('title', 'High Performance')</title>

                                        <style>
                                            /* Global responsive layout (clean canonical version) */
                                            *, *:before, *:after { box-sizing: border-box; }
                                            body {
                                                margin: 0;
                                                font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
                                                background: #000;
                                                color: #fff;
                                                -webkit-font-smoothing: antialiased;
                                                -moz-osx-font-smoothing: grayscale;
                                                line-height: 1.4;
                                                min-height: 100vh;
                                            }

                                            /* Fixed header */
                                            header.site-header {
                                                background: #ff0000;
                                                color: #000;
                                                position: fixed;
                                                top: 0;
                                                left: 0;
                                                right: 0;
                                                z-index: 1000;
                                                padding: 12px 16px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: space-between;
                                                gap: 12px;
                                                font-weight: 700;
                                                box-shadow: 0 6px 18px rgba(0,0,0,0.45);
                                            }

                                            header .brand { font-size: 16px; }
                                            header .nav { display: flex; gap: 8px; align-items: center; }

                                            main.site-main {
                                                max-width: 1100px;
                                                margin: 84px auto 40px auto; /* allow header space */
                                                padding: 18px;
                                            }

                                            .container {
                                                background: transparent;
                                                border: 2px solid #ff0000;
                                                padding: 20px;
                                                border-radius: 8px;
                                            }

                                            .red-btn {
                                                display: inline-block;
                                                padding: 10px 14px;
                                                background: #ff0000;
                                                color: #000;
                                                text-decoration: none;
                                                border: none;
                                                cursor: pointer;
                                                font-weight: 700;
                                            }

                                            .calc-form { display: grid; grid-template-columns: 1fr 2fr; gap: 12px 18px; align-items: center; }
                                            .calc-form label { justify-self: end; margin-right: 6px; }
                                            .calc-form input, .calc-form select { padding: 10px; background: #000; color: #fff; border: 1px solid #ff0000; width: 100%; }
                                            .button-container { grid-column: 1 / -1; display: flex; gap: 10px; justify-content: center; }

                                            .result-row { display:flex; gap:12px; align-items:center; flex-wrap:wrap; }
                                            .result-label { font-weight:700; min-width: 160px; }

                                            @media (max-width: 900px) {
                                                main.site-main { padding: 14px; margin-top: 72px; }
                                                .calc-form { grid-template-columns: 1fr 1fr; }
                                            }

                                            @media (max-width: 600px) {
                                                header.site-header { padding: 10px 12px; }
                                                header .brand { font-size: 15px; }
                                                main.site-main { margin-top: 66px; padding: 12px; }
                                                .calc-form { grid-template-columns: 1fr; gap: 10px; }
                                                .calc-form label { justify-self: start; }
                                                .button-container { flex-direction: column; }
                                                .red-btn { width: 100%; }
                                                .result-label { min-width: 120px; }
                                            }
                                        </style>

                                        @stack('styles')
                                    </head>
                                    <body>
                                        <header class="site-header">
                                            <div class="brand">@yield('header', 'High Performance')</div>
                                            <nav class="nav">@yield('header_actions')</nav>
                                        </header>

                                        <main class="site-main">
                                            @yield('content')
                                        </main>

                                        @stack('scripts')
                                    </body>
                                    </html>
