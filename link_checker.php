<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="批量链接检查, 链接有效性, SEO工具, 网站维护, 鼓狮知识库, 网页链接测试">
    <meta name="description" content="鼓狮知识库提供的批量网页链接联通性测试工具，帮助您快速检查多个网页上的所有链接是否有效。">
    <!-- Viewport meta from template was more specific, using that one -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>批量网页链接联通性测试工具，网页死链检查工具 - 鼓狮知识库</title>
    <link rel="shortcut icon" href="https://tools.gushiio.com/favicon.png" type="image/x-icon">

    <style>
        /* --- 通用样式 & 来自 style.css (Template Styles) --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: block; /* Changed from flex to block for typical page flow */
            min-height: auto; /* Changed from 100vh */
            align-items: auto; /* Removed, not needed for block */
            justify-content: auto; /* Removed, not needed for block */
            margin: 0;
        }

        body.dark-mode {
            background-color: #1a1a1a;
            color: #e0e0e0;
        }

        /* --- Header 样式 (Template Styles) --- */
        header {
            background-color: #222;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        header .logo {
            display: flex;
            align-items: center;
        }

        header .logo img {
            max-height: 40px;
            display: block;
        }


        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 3px;
            background-color: #a62a1a;
            transition: width 0.3s ease-out;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Dropdown 样式 (More Tools) (Template Styles) */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 500;
            display: flex; 
            align-items: center;
        }

        .dropdown-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .dropdown-toggle svg.caret-icon {
            width: 0.8em; 
            height: 0.8em; 
            margin-left: 5px; 
            fill: currentColor; 
             vertical-align: middle; 
             transition: fill 0.3s ease; 
        }


        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 180px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            overflow: hidden;
            z-index: 1000;
            top: calc(100% + 10px);
            left: 0;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .dropdown-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu a {
            color: #333;
            padding: 12px 18px;
            text-decoration: none;
            display: block;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: normal;
            border-bottom: 1px solid #eee;
        }

        .dropdown-menu a:last-child {
            border-bottom: none;
        }


        .dropdown-menu a:hover {
            background-color: #f0f0f0;
            color: #a62a1a;
        }

        body.dark-mode .dropdown-menu {
            background-color: #333;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        body.dark-mode .dropdown-menu a {
            color: #e0e0e0;
            border-bottom-color: #444;
        }

        body.dark-mode .dropdown-menu a:hover {
            background-color: #444;
            color: #a62a1a;
        }

        /* --- Banner 样式 (Template Styles) --- */
        .banner {
            background-image: url(https://tools.gushiio.com/img/toolsbanner.png); /* Absolute path */
            background-color: #a62a1a;
            color: white;
            text-align: center;
            padding: 50px 20px;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        body.dark-mode .banner {
            background-color: #8b2214;
            /* background-image already set, but can be repeated for explicitness if desired */
            /* background-image: url(https://tools.gushiio.com/img/toolsbanner.png); */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }


        .banner a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: underline;
            font-size: 18px;
            font-weight: normal;
        }

        .banner a:hover {
            color: white;
        }

        /* --- Container 样式 (Template Styles) --- */
        /* This container will wrap the link_checker's content */
        .container {
            max-width: 1200px; /* Template's container width */
            margin: 20px auto;
            padding: 0 20px;
            /* margin-top: 60px;  Original template had this, can be adjusted if needed */
        }
        
        /* Styles specific to link_checker.php */
        /* The link_checker's own .container style is no longer needed as it's inside the template's .container */
        /* body for link_checker.php - some might be overridden by template body style */
        body.link-checker-page { /* Adding a class to body for link_checker specific overrides if needed */
            font-family: sans-serif;
            line-height: 1.6;
            margin: 0; /* Margin now controlled by template and .container */
            /* background-color: #f4f4f4; */ /* Template handles background */
        }
        /* The link_checker content (form, results) will be inside template's .container */
        /* If we need to constrain the link_checker's content to 900px, we'd add a wrapper inside */
        /* For now, it will use the template's .container (max-width: 1200px) */
        .link-checker-content-wrapper {
            background: #fff; /* Moved background from link_checker's .container */
            padding: 20px;    /* Moved padding from link_checker's .container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Add some bottom margin if it's the last element */
        }
        body.dark-mode .link-checker-content-wrapper {
            background: #2d2d2d; /* Dark mode background for the content area */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }


        /* Link checker H1, H2 */
        .link-checker-content-wrapper h1, 
        .link-checker-content-wrapper h2 {
            text-align: center;
            color: #333;
        }
        body.dark-mode .link-checker-content-wrapper h1,
        body.dark-mode .link-checker-content-wrapper h2 {
            color: #e0e0e0;
        }


        .link-checker-content-wrapper form {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        body.dark-mode .link-checker-content-wrapper form {
            border-color: #444;
            background-color: #252525;
        }

        .link-checker-content-wrapper label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .link-checker-content-wrapper textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: #fff;
            color: #333;
        }
        body.dark-mode .link-checker-content-wrapper textarea {
            border-color: #555;
            background-color: #333;
            color: #e0e0e0;
        }

        .link-checker-content-wrapper input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .link-checker-content-wrapper input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        .link-checker-content-wrapper .results {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        body.dark-mode .link-checker-content-wrapper .results {
            border-top-color: #444;
        }

        .link-checker-content-wrapper table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .link-checker-content-wrapper th, 
        .link-checker-content-wrapper td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-break: break-word;
        }
        body.dark-mode .link-checker-content-wrapper th, 
        body.dark-mode .link-checker-content-wrapper td {
            border-bottom-color: #444;
        }


        .link-checker-content-wrapper th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        body.dark-mode .link-checker-content-wrapper th {
            background-color: #3a3a3a;
        }

        .link-checker-content-wrapper tr:hover {
            background-color: #f5f5f5;
        }
        body.dark-mode .link-checker-content-wrapper tr:hover {
            background-color: #333;
        }

        .link-checker-content-wrapper .status-200 { color: green; font-weight: bold; }
        .link-checker-content-wrapper .status-3xx { color: orange; font-weight: bold; }
        .link-checker-content-wrapper .status-4xx { color: red; font-weight: bold; }
        .link-checker-content-wrapper .status-5xx { color: darkred; font-weight: bold; }
        .link-checker-content-wrapper .status-error { color: grey; font-weight: bold; }

        body.dark-mode .link-checker-content-wrapper .status-200 { color: #66bb6a; } /* Light green */
        body.dark-mode .link-checker-content-wrapper .status-3xx { color: #ffa726; } /* Light orange */
        body.dark-mode .link-checker-content-wrapper .status-4xx { color: #ef5350; } /* Light red */
        body.dark-mode .link-checker-content-wrapper .status-5xx { color: #c62828; } /* Darker red, still visible */
        body.dark-mode .link-checker-content-wrapper .status-error { color: #bdbdbd; } /* Light grey */


        .link-checker-content-wrapper .error {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffe6e6;
            border: 1px solid #ffb3b3;
            border-radius: 4px;
        }
        body.dark-mode .link-checker-content-wrapper .error {
            color: #ef9a9a; /* Lighter red for text */
            background-color: #4d2323; /* Dark red background */
            border: 1px solid #8c3a3a; /* Darker red border */
        }

        .link-checker-content-wrapper .info {
            color: blue;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #e6f3ff;
            border: 1px solid #b3d9ff;
            border-radius: 4px;
        }
        body.dark-mode .link-checker-content-wrapper .info {
            color: #90caf9; /* Lighter blue for text */
            background-color: #1e3a5f; /* Dark blue background */
            border: 1px solid #3c5a7f; /* Darker blue border */
        }

        .link-checker-content-wrapper .summary {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        body.dark-mode .link-checker-content-wrapper .summary {
            border-color: #444;
            background-color: #252525;
        }

        .link-checker-content-wrapper .summary p {
             margin: 5px 0;
        }
        .link-checker-content-wrapper .failed-links-list {
            margin-top: 20px;
        }
        .link-checker-content-wrapper .failed-links-list h2 {
            color: #d9534f;
        }
        body.dark-mode .link-checker-content-wrapper .failed-links-list h2 {
            color: #ef5350; /* Lighter red for dark mode */
        }

        .link-checker-content-wrapper .failed-links-list ul {
             list-style: none;
             padding: 0;
         }
        .link-checker-content-wrapper .failed-links-list li {
             background-color: #ffebee;
             border: 1px solid #ffccbc;
             margin-bottom: 10px;
             padding: 10px;
             border-radius: 4px;
         }
         body.dark-mode .link-checker-content-wrapper .failed-links-list li {
             background-color: #4d2323; /* Dark red background */
             border: 1px solid #8c3a3a; /* Darker red border */
         }

        .link-checker-content-wrapper .failed-links-list li strong {
              color: #c62828; 
          }
        body.dark-mode .link-checker-content-wrapper .failed-links-list li strong {
            color: #ef9a9a; /* Lighter red for text */
        }

        .link-checker-content-wrapper .failed-links-list li span {
               font-size: 0.9em;
               color: #555;
           }
        body.dark-mode .link-checker-content-wrapper .failed-links-list li span {
            color: #aaa;
        }
        body.dark-mode .link-checker-content-wrapper .failed-links-list li a { /* Ensure links are visible */
            color: #90caf9; /* Light blue for links in dark mode */
        }
        body.dark-mode .link-checker-content-wrapper .failed-links-list li a:hover {
            color: #e3f2fd;
        }
         body.dark-mode .link-checker-content-wrapper td a { /* Ensure table links are visible */
            color: #90caf9;
        }
        body.dark-mode .link-checker-content-wrapper td a:hover {
            color: #e3f2fd;
        }


        /* --- Header 按钮样式 (Template Styles) --- */
        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn svg.icon {
            width: 1.1em;
            height: 1.1em;
            margin-right: 5px;
            fill: currentColor;
            vertical-align: -0.125em;
            transition: fill 0.3s ease;
        }

        .btn-dark {
            background-color: #555;
            color: #fff;
        }

        .btn-dark:hover {
            background-color: #666;
            transform: scale(1.05);
        }

        body.dark-mode .btn-dark {
            background-color: #666;
        }

        body.dark-mode .btn-dark:hover {
            background-color: #777;
        }

        /* --- Footer 样式 (Template Styles) --- */
        .footer {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 0; 
            padding: 20px 20px; 
            background-color: #992718;
            color: white; 
            font-size: 13px;
        }

        .footer a {
            text-decoration: none;
            color: white; 
        }

        body.dark-mode .footer {
            background-color: #7a2013; 
        }

        /* --- 响应式调整 (Template Styles) --- */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 15px;
                padding: 10px 15px;
            }

            .nav-links {
                gap: 12px;
                justify-content: center;
                width: 100%;
            }

            .nav-links a,
            .dropdown-toggle,
            .btn-dark {
                padding: 8px 10px;
                font-size: 13px;
            }

            .dropdown {
                width: 100%;
                text-align: center;
            }

            .dropdown-toggle {
                /* width: 100%; */ /* Removed to allow natural width with centering */
                justify-content: center; /* Center content of toggle */
            }

            .dropdown-menu {
                min-width: 100%;
                left: 0;
                top: calc(100% + 5px);
                transform: translateY(5px);
            }
            .dropdown-menu.active {
                transform: translateY(0);
            }
            .dropdown-menu a {
                padding: 10px 15px;
            }

            .banner {
                padding: 40px 15px;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .container { /* Template container */
                padding: 0 15px;
                /* margin-top: 40px; */ /* Already has margin: 20px auto */
            }
            .link-checker-content-wrapper { /* Specific content wrapper */
                padding: 15px;
            }

            .footer {
                 padding: 15px; 
            }
        }

        @media (max-width: 480px) {
            header {
                padding: 10px;
                gap: 10px;
            }

            header .logo img {
                max-height: 35px;
            }

            .nav-links {
                flex-direction: column;
                gap: 8px;
                width: 100%;
                align-items: stretch;
            }

            .nav-links a,
            .dropdown-toggle,
            .btn-dark {
                text-align: center;
                padding: 10px;
            }

            .banner {
                font-size: 20px;
                padding: 30px 10px;
            }

            .container { /* Template container */
                padding: 0 10px;
                /* margin-top: 30px; */
            }
            .link-checker-content-wrapper { /* Specific content wrapper */
                padding: 10px;
            }
            .link-checker-content-wrapper h1 {
                font-size: 1.5rem;
            }
            .link-checker-content-wrapper textarea {
                font-size: 0.9rem;
            }
            .link-checker-content-wrapper input[type="submit"] {
                font-size: 0.9rem;
            }
            .link-checker-content-wrapper th,
            .link-checker-content-wrapper td {
                padding: 8px;
                font-size: 0.9rem;
            }


            .footer {
                 padding: 10px;
            }
        }
    </style>
    
</head>

<body class="link-checker-page"> <!-- Added class for potential specific overrides -->
    <header>
        <div class="logo">
            <img src="https://tools.gushiio.com/img/gushizhishiku.png" alt="鼓狮知识库logo">
        </div>
        <div class="nav-links">
            <a href="https://www.gushiio.com/">鼓狮首页</a>
            <a href="https://tools.gushiio.com/">工具箱首页</a>
            <a href="/proto">在线原型设计</a>
            <a href="/jizhang">在线记账</a>
            <a href="https://data.gushiio.com/" target="_blank">鼓狮大数据</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">更多工具
                    <svg class="caret-icon" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.5-24.4 9.5-33.8 0z"/></svg>
                </a>
                <div class="dropdown-menu">
                    <a href="https://tools.gushiio.com/jianfan">简繁转换</a>
                    <a href="https://tools.gushiio.com/pinyin">汉字转拼音</a>
                    <a href="https://tools.gushiio.com/time">全球实时时间</a>
                    <a href="http://ai.gushiio.com/link_checker.php">批量链接检查</a>
                    <a href="http://ai.gushiio.com/sitemap.php">Sitemap生成器</a>
                </div>
            </div>
            <button type="button" class="btn btn-dark toggle-theme">
                <svg class="icon icon-moon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M530.4 945.4A434.2 434.2 0 0 1 491.5 78.6a41 41 0 0 1 26 70.9 261.7 261.7 0 0 0-83.6 192.3 266.2 266.2 0 0 0 266.2 266.2 262.3 262.3 0 0 0 191.7-82.9s0 1 0 0a41 41 0 0 1 70.7 24.6 434.2 434.2 0 0 1-432.1 395.7z"></path></svg>
                <svg class="icon icon-sun" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" style="display:none;"><path d="M871.5 358.8V155.4H655.4L508.2 11.6 355.4 160.8H147.1V372L0 515.9l152.8 149.3v203.4h216.1l147.2 143.8 152.9-149.3h208.2V651.9l147.1-143.9-147.1-149.2zM512.2 802c-164 0-296.8-129.8-296.8-290 0-160.2 132.9-289.9 296.8-289.9 163.9 0 296.8 129.8 296.8 289.9 0 160.2-132.9 290-296.8 290z"></path><path d="M697.4 511.9c0 100.1-82.9 181.2-185.3 181.2s-185.3-81.1-185.3-181.2c0-100 82.9-181 185.3-181 102.3 0 185.3 81 185.3 181z"></path></svg>
                <span>暗夜模式</span>
            </button>
        </div>
    </header>

    <div class="banner">鼓狮知识库 - 批量网页链接联通性测试工具</div>

    <div class="container">
        <!-- The link_checker.php content will go here, inside a wrapper for its specific background/padding -->
        <div class="link-checker-content-wrapper"> 
            <p>在下面的文本框中输入您想测试的网页 URL 列表，每行一个。工具将逐一抓取这些页面，找出页面上的所有链接并检查它们是否可访问。 （最新版源码下载地址：<a href="https://tools.gushiio.com/down.html" target="_blank">tools.gushiio.com</a>）</p>

            <form action="" method="post">
                <label for="urls">目标网页 URL 列表 (每行一个，最多20个):</label>
                <textarea id="urls" name="urls" rows="10" placeholder="例如:&#x0A;https://www.example.com/&#x0A;https://another-example.org/page1&#x0A;https://www.gushiio.com/" required><?php echo htmlspecialchars($_POST['urls'] ?? ''); ?></textarea>
                <input type="submit" value="开始批量测试">
            </form>

            <?php
            // ini_set('display_errors', 1);
            // error_reporting(E_ALL);

            if (!function_exists('str_starts_with')) {
                function str_starts_with(string $haystack, string $needle): bool {
                    return substr($haystack, 0, strlen($needle)) === $needle;
                }
            }

            function resolve_url(string $base_url, string $relative_url): string {
                if (parse_url($relative_url, PHP_URL_SCHEME) !== null) {
                    return $relative_url;
                }

                $base_parts = parse_url($base_url);
                if ($base_parts === false || !isset($base_parts['scheme']) || !isset($base_parts['host'])) {
                    error_log("Warning: Malformed base URL provided to resolve_url: " . $base_url);
                    if (str_starts_with($relative_url, '//')) {
                         $scheme = isset($base_parts['scheme']) ? $base_parts['scheme'] : 'http';
                         return $scheme . ':' . $relative_url;
                    }
                    return $relative_url;
                }

                if (str_starts_with($relative_url, '//')) {
                     $scheme = isset($base_parts['scheme']) ? $base_parts['scheme'] : 'http';
                    return $scheme . ':' . $relative_url;
                }

                if (str_starts_with($relative_url, '/')) {
                    $port = isset($base_parts['port']) ? ':' . $base_parts['port'] : '';
                    $scheme = isset($base_parts['scheme']) ? $base_parts['scheme'] : 'http';
                    $host = isset($base_parts['host']) ? $base_parts['host'] : '';
                    return $scheme . '://' . $host . $port . $relative_url;
                }

                $base_path = isset($base_parts['path']) ? $base_parts['path'] : '/';
                $base_path = preg_replace('#/[^/]*$#', '/', $base_path);

                 $port = isset($base_parts['port']) ? ':' . $base_parts['port'] : '';
                 $scheme = isset($base_parts['scheme']) ? $base_parts['scheme'] : 'http';
                 $host = isset($base_parts['host']) ? $base_parts['host'] : '';

                 $path_segments = explode('/', rtrim($base_path, '/') . '/' . ltrim($relative_url, '/'));
                 $resolved_segments = [];
                 foreach ($path_segments as $segment) {
                     if ($segment === '.' || $segment === '') {
                         if (empty($resolved_segments)) $resolved_segments[] = ''; // Keep leading slash if path was just '/'
                         continue;
                     }
                     if ($segment === '..') {
                         if (count($resolved_segments) > 1) { // Don't pop the initial empty segment representing root
                            array_pop($resolved_segments);
                         }
                     } else {
                         $resolved_segments[] = $segment;
                     }
                 }
                 $resolved_path = implode('/', $resolved_segments);
                 // Ensure path starts with a slash if it's not empty, or if it was originally meant to be root
                if (substr($resolved_path, 0, 1) !== '/' && $resolved_path !== '') {
                    $resolved_path = '/' . $resolved_path;
                } elseif ($resolved_path === '') {
                    $resolved_path = '/';
                }


                return $scheme . '://' . $host . $port . $resolved_path;
            }


            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['urls']) && !empty($_POST['urls'])) {
                $input_urls = array_filter(array_map('trim', explode("\n", $_POST['urls'])));

                $max_urls_to_process = 20;
                if (count($input_urls) > $max_urls_to_process) {
                     echo '<div class="info">提示: 检测到超过 ' . $max_urls_to_process . ' 条 URL，将只处理前 ' . $max_urls_to_process . ' 条。</div>';
                     $input_urls = array_slice($input_urls, 0, $max_urls_to_process);
                }

                if (empty($input_urls)) {
                    echo '<div class="error">错误: 没有检测到有效的 URL。</div>';
                } else {
                    $total_input_urls = count($input_urls);
                    $processed_input_count = 0;

                    $total_links_found_across_all_pages = 0;
                    $total_links_checked_across_all_pages = 0;
                    $total_good_links = 0;
                    $total_bad_links = 0;
                    $all_failed_links = [];

                    echo '<div class="info">开始处理 ' . $total_input_urls . ' 条 URL...</div>';

                    foreach ($input_urls as $index => $target_url) {
                        $processed_input_count++;
                        $original_target_url = $target_url;

                        if (!filter_var($target_url, FILTER_VALIDATE_URL)) {
                             echo '<div class="error">跳过无效 URL (' . $processed_input_count . '/' . $total_input_urls . '): <strong>' . htmlspecialchars($original_target_url) . '</strong></div>';
                             continue;
                        }

                        echo '<div class="info">[' . $processed_input_count . '/' . $total_input_urls . '] 正在分析页面: <strong>' . htmlspecialchars($original_target_url) . '</strong></div>';

                        $html_content = '';
                        $effective_url = $target_url;

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $target_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 LinkChecker');
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

                        $html_content = curl_exec($ch);
                        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        $curl_error = curl_error($ch);
                        $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                        curl_close($ch);

                        if ($curl_error) {
                            echo '<div class="error">抓取页面错误: ' . htmlspecialchars($original_target_url) . ' - ' . htmlspecialchars($curl_error) . '</div>';
                        } elseif ($http_code === 0) {
                             echo '<div class="error">抓取页面错误: ' . htmlspecialchars($original_target_url) . ' - 连接或超时错误</div>';
                        } elseif ($http_code >= 400) {
                             echo '<div class="error">抓取页面失败 (' . htmlspecialchars($http_code) . '): <strong>' . htmlspecialchars($original_target_url) . '</strong> - 无法继续解析链接。</div>';
                        } elseif ($http_code != 200) {
                            echo '<div class="info">抓取页面成功但返回状态码 ' . htmlspecialchars($http_code) . ': <strong>' . htmlspecialchars($effective_url) . '</strong> (原URL: ' . htmlspecialchars($original_target_url) . ')</div>';
                        } else {
                            echo '<div class="info">成功抓取页面 (' . htmlspecialchars($http_code) . '): <strong>' . htmlspecialchars($effective_url) . '</strong> (原URL: ' . htmlspecialchars($original_target_url) . ')</div>';
                        }

                        $page_links = [];
                        $checked_urls_for_this_page = [];
                         $current_page_links_found = 0;

                        if (!empty($html_content) && $http_code >= 200 && $http_code < 400) {
                            $dom = new DOMDocument();
                            libxml_use_internal_errors(true);
                            @$dom->loadHTML('<?xml encoding="UTF-8">' . $html_content); // Added XML encoding to help with parsing
                            libxml_clear_errors();

                            $anchor_tags = $dom->getElementsByTagName('a');

                            foreach ($anchor_tags as $tag) {
                                $href = $tag->getAttribute('href');
                                $is_fragment = substr($href, 0, 1) === '#';
                                $is_mailto = strpos($href, 'mailto:') === 0; // More robust check
                                $is_tel = strpos($href, 'tel:') === 0;
                                $is_javascript = strpos($href, 'javascript:') === 0;

                                if (!empty($href) && !$is_fragment && !$is_mailto && !$is_tel && !$is_javascript) {
                                    $absolute_url = resolve_url($effective_url, $href);
                                     if (filter_var($absolute_url, FILTER_VALIDATE_URL) && 
                                         (parse_url($absolute_url, PHP_URL_SCHEME) === 'http' || parse_url($absolute_url, PHP_URL_SCHEME) === 'https')) {
                                        $current_page_links_found++;
                                        if (!isset($page_links[$absolute_url])) {
                                            $page_links[$absolute_url] = [
                                                'href' => $href,
                                                'source_url' => $original_target_url
                                            ];
                                        }
                                    }
                                }
                            }
                        }

                        $total_links_found_across_all_pages += $current_page_links_found;
                        echo '<div class="info">找到 ' . $current_page_links_found . ' 个链接 (检查唯一链接: ' . count($page_links) . ')。正在检查这些链接...</div>';


                        if (!empty($page_links)) {
                            $current_page_results = [];
                            $current_page_good_links = 0;
                            $current_page_bad_links = 0;

                            foreach ($page_links as $absolute_url => $link_data) {
                                 if (isset($checked_urls_for_this_page[$absolute_url])) {
                                     $result = $checked_urls_for_this_page[$absolute_url];
                                 } else {
                                    $total_links_checked_across_all_pages++;

                                    $link_ch = curl_init();
                                    curl_setopt($link_ch, CURLOPT_URL, $absolute_url);
                                    curl_setopt($link_ch, CURLOPT_NOBODY, true);
                                    curl_setopt($link_ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($link_ch, CURLOPT_FOLLOWLOCATION, true);
                                    curl_setopt($link_ch, CURLOPT_MAXREDIRS, 5);
                                    curl_setopt($link_ch, CURLOPT_TIMEOUT, 10);
                                    curl_setopt($link_ch, CURLOPT_CONNECTTIMEOUT, 5);
                                    curl_setopt($link_ch, CURLOPT_USERAGENT, 'BatchLinkChecker/1.1 (PHP; +https://tools.gushiio.com/link_checker.php)');
                                    curl_setopt($link_ch, CURLOPT_SSL_VERIFYPEER, true);
                                    curl_setopt($link_ch, CURLOPT_SSL_VERIFYHOST, 2);

                                    curl_exec($link_ch);
                                    $link_http_code = curl_getinfo($link_ch, CURLINFO_HTTP_CODE);
                                    $link_curl_error = curl_error($link_ch);
                                    $link_effective_url = curl_getinfo($link_ch, CURLINFO_EFFECTIVE_URL);
                                    curl_close($link_ch);

                                    $status_text = '未知错误';
                                    $status_class = 'status-error';
                                    $is_bad = true;

                                    if ($link_curl_error) {
                                        $status_text = 'CURL 错误: ' . htmlspecialchars($link_curl_error);
                                    } elseif ($link_http_code === 0) {
                                         $status_text = '连接或超时错误';
                                    } else {
                                        $status_text = 'HTTP ' . $link_http_code;
                                        if ($link_http_code >= 200 && $link_http_code < 300) {
                                            $status_text .= ' (OK)'; $status_class = 'status-200'; $is_bad = false; $current_page_good_links++;
                                        } elseif ($link_http_code >= 300 && $link_http_code < 400) {
                                            $status_text .= ' (Redirect)'; $status_class = 'status-3xx'; $is_bad = false; $current_page_good_links++;
                                        } elseif ($link_http_code >= 400 && $link_http_code < 500) {
                                            $status_text .= ' (Client Error)'; $status_class = 'status-4xx'; $current_page_bad_links++;
                                        } elseif ($link_http_code >= 500 && $link_http_code < 600) {
                                            $status_text .= ' (Server Error)'; $status_class = 'status-5xx'; $current_page_bad_links++;
                                        } else {
                                             $status_text .= ' (Unexpected Code)'; $status_class = 'status-error'; $current_page_bad_links++;
                                        }
                                    }

                                    $result = [
                                        'href' => $link_data['href'],
                                        'absolute_url' => $absolute_url,
                                        'effective_url' => $link_effective_url ?: $absolute_url, // Fallback if empty
                                        'code' => $link_http_code,
                                        'status_text' => $status_text,
                                        'status_class' => $status_class,
                                        'error' => $link_curl_error,
                                        'is_bad' => $is_bad,
                                        'source_url' => $link_data['source_url']
                                    ];
                                    $checked_urls_for_this_page[$absolute_url] = $result;
                                 }
                                 $current_page_results[] = $result;
                            }

                            $total_good_links += $current_page_good_links;
                            $total_bad_links += $current_page_bad_links;

                             foreach($current_page_results as $link_result) {
                                 if ($link_result['is_bad']) {
                                     $all_failed_links[] = $link_result;
                                 }
                             }
                            ?>
                            <div class="results">
                                <h3>页面链接检查结果: <?php echo htmlspecialchars($original_target_url); ?></h3>
                                 <p>找到链接: <?php echo $current_page_links_found; ?> | 检查唯一链接: <?php echo count($page_links); ?> | 联通 (OK/Redirect): <?php echo $current_page_good_links; ?> | 失效: <?php echo $current_page_bad_links; ?></p>
                                <?php if (!empty($current_page_results)): ?>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width: 25%;">原始链接 (href)</th>
                                                <th style="width: 50%;">绝对 URL</th>
                                                <th style="width: 25%;">状态</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($current_page_results as $result): ?>
                                                <tr>
                                                    <td><code><?php echo htmlspecialchars($result['href']); ?></code></td>
                                                    <td><a href="<?php echo htmlspecialchars($result['absolute_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($result['absolute_url']); ?></a>
                                                        <?php if ($result['absolute_url'] !== $result['effective_url'] && !empty($result['effective_url'])): ?>
                                                            <br><small>(最终地址: <a href="<?php echo htmlspecialchars($result['effective_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($result['effective_url']); ?></a>)</small>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="<?php echo $result['status_class']; ?>">
                                                        <?php echo $result['status_text']; // Already htmlspecialchars in curl error case ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                            <?php
                        } elseif ($http_code >= 200 && $http_code < 400) {
                            echo '<div class="info">页面 <strong>' . htmlspecialchars($original_target_url) . '</strong> 上未找到可检查的链接 (&lt;a href="..."&gt;)。</div>';
                        }
                         echo '<hr style="border:0; border-top: 1px solid #ccc; margin: 20px 0;">';
                    }

                    echo '<div class="summary">';
                    echo '<h2>整体测试总结</h2>';
                    echo '<p>总共处理输入 URL: <strong>' . $processed_input_count . '</strong> 条</p>';
                    echo '<p>总共找到链接 (所有页面，非唯一): <strong>' . $total_links_found_across_all_pages . '</strong> 个</p>';
                    echo '<p>总共检查唯一链接: <strong>' . $total_links_checked_across_all_pages . '</strong> 个</p>';
                    echo '<p class="status-200">联通链接总数 (OK/Redirect): <strong>' . $total_good_links . '</strong> 个</p>';
                    echo '<p class="status-4xx">失效链接总数: <strong>' . $total_bad_links . '</strong> 个</p>';
                    echo '</div>';

                    if (!empty($all_failed_links)) {
                        echo '<div class="failed-links-list">';
                        echo '<h2>所有失效链接列表 (' . count($all_failed_links) . ' 个)</h2>';
                        echo '<ul>';
                        foreach ($all_failed_links as $failed_link) {
                            echo '<li>';
                            echo '<strong>' . $failed_link['status_text'] . ':</strong> ';
                            echo '<a href="' . htmlspecialchars($failed_link['absolute_url']) . '" target="_blank" rel="noopener noreferrer">' . htmlspecialchars($failed_link['absolute_url']) . '</a>';
                            if ($failed_link['absolute_url'] !== $failed_link['effective_url'] && !empty($failed_link['effective_url'])) {
                                 echo ' (最终地址: <a href="' . htmlspecialchars($failed_link['effective_url']) . '" target="_blank" rel="noopener noreferrer">' . htmlspecialchars($failed_link['effective_url']) . '</a>)';
                            }
                            echo '<br><span>(来自页面: <a href="' . htmlspecialchars($failed_link['source_url']) . '" target="_blank" rel="noopener noreferrer">' . htmlspecialchars($failed_link['source_url']) . '</a>)</span>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    } else {
                         echo '<div class="info">恭喜！在所有检查的页面上未发现失效链接。</div>';
                    }
                }
            }
            ?>
        </div> <!-- End .link-checker-content-wrapper -->
    </div> <!-- End .container (template's container) -->

    <div class="footer">
        Copyright &copy; 鼓狮知识库（www.GuShiio.com） 版权所有
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?32b22a347224cca50c88deb9ffa4250b";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </div>

    <script>
        // --- 主题切换 JavaScript ---
        function initializeTheme() {
            const savedTheme = localStorage.getItem('darkMode');
            const isDark = savedTheme === 'true';
            document.body.classList.toggle('dark-mode', isDark);

            const themeButton = document.querySelector('.toggle-theme');
            if (themeButton) {
                const iconMoon = themeButton.querySelector('.icon-moon');
                const iconSun = themeButton.querySelector('.icon-sun');
                const textSpan = themeButton.querySelector('span');

                if (!iconMoon || !iconSun || !textSpan) return;

                if (isDark) {
                    iconMoon.style.display = 'none';
                    iconSun.style.display = 'inline';
                    textSpan.textContent = '日间模式';
                } else {
                    iconMoon.style.display = 'inline';
                    iconSun.style.display = 'none';
                    textSpan.textContent = '暗夜模式';
                }
            }
        }

        function setupThemeToggle() {
            const themeButton = document.querySelector('.toggle-theme');
            if (themeButton) {
                themeButton.addEventListener('click', function() {
                    const isDark = document.body.classList.toggle('dark-mode');
                    localStorage.setItem('darkMode', isDark);

                    const iconMoon = this.querySelector('.icon-moon');
                    const iconSun = this.querySelector('.icon-sun');
                    const textSpan = this.querySelector('span');

                    if (!iconMoon || !iconSun || !textSpan) return;

                    if (isDark) {
                        iconMoon.style.display = 'none';
                        iconSun.style.display = 'inline';
                        textSpan.textContent = '日间模式';
                    } else {
                        iconMoon.style.display = 'inline';
                        iconSun.style.display = 'none';
                        textSpan.textContent = '暗夜模式';
                    }
                });
            }
        }

        // --- Dropdown JavaScript ---
        function setupDropdown() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle'); // Use querySelectorAll for multiple dropdowns if any

            dropdownToggles.forEach(dropdownToggle => {
                const dropdownMenu = dropdownToggle.nextElementSibling; // Assumes menu is sibling
                if (!dropdownMenu || !dropdownMenu.classList.contains('dropdown-menu')) return;

                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation(); // Prevent click from immediately closing due to window listener
                    
                    // Close other open dropdowns
                    document.querySelectorAll('.dropdown-menu.active').forEach(openMenu => {
                        if (openMenu !== dropdownMenu) {
                            openMenu.classList.remove('active');
                        }
                    });
                    dropdownMenu.classList.toggle('active');
                });
            });
            
            window.addEventListener('click', function(e) {
                document.querySelectorAll('.dropdown-menu.active').forEach(dropdownMenu => {
                    // Check if the click was outside the menu and its toggle
                    const toggle = dropdownMenu.previousElementSibling;
                    if (toggle && !toggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                         dropdownMenu.classList.remove('active');
                    }
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            initializeTheme();
            setupThemeToggle();
            setupDropdown();
        });
    </script>

</body>
</html>
