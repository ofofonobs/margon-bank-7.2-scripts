<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Admin Dashboard <?php echo $site_title; ?>   - Credit Cards, Banking, Loans and Mobile Payments
  </title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="../../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
     <img alt="" src="pic/admin.jpg">        </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="settings.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Change User Status</span>
              </a>
             
              <a href="tickets.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>View Tickets</span>
              </a>
              <a href="messages.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Compose Messages</span>
              </a>
              
               <a href="billing.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Activate/Deactivate Billing Code</span>
              </a>
              
                 <a href="upload.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Upload User Image</span>
              </a>
              
               <a href="update.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Update User</span>
              </a>
              
               <a href="pendingacc.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Pending Accounts</span>
              </a>
              
        
          
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                  <i class='fas fa-power-off' style='font-size:18px;color:black'></i> 
                <span>Logout</span>
              </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="../../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <!-- GTranslate: https://gtranslate.io/ -->


<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

<br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>

        </form>
        <!-- Navigation mobile menu -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="index.php">
           <i class='fas fa-home' style='font-size:18px;color:black'></i>  Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="new_account.php">
              <i class="ni ni-planet text-blue"></i> Add New User
            </a>
          </li>
     
         
          
            <li class="nav-item">
            <a class="nav-link " href="view_account.php">
            <i class='fas fa-dollar-sign' style='font-size:18px;color:black'></i>View Users Account
            </a>
          </li>
            
          
          <li class="nav-item">
            <a class="nav-link " href="transfer_status.php">
                 <i class='fas fa-lira-sign' style='font-size:18px;color:black'></i> Transfer Status
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="billing.php">
                 <i class='fas fa-lira-sign' style='font-size:18px;color:black'></i>Activate/Deactive Billing Code
            </a>
          </li>
          
   
          
           <li class="nav-item">
            <a class="nav-link" href="add-transfer.php">
                <i class='fas fa-fax' style='font-size:18px;color:black'></i>Add Transfer
            </a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" href="credit_debit_list.php">
                <i class='fas fa-fax' style='font-size:18px;color:black'></i>DR/CR Transaction History
            </a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" href="transfer_rec.php">
                <i class='fas fa-fax' style='font-size:18px;color:black'></i>Transfer Records & Status
            </a>
          </li>
            
              <li class="nav-item">
            <a class="nav-link" href="credit.php">
                <i class='fas fa-fax' style='font-size:18px;color:black'></i>Credit User
            </a>
          </li>
             <li class="nav-item">
            <a class="nav-link " href="debit.php">
                 <i class='fas fa-lira-sign' style='font-size:18px;color:black'></i>Debit User
            </a>
          </li>
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
       
      </div>
    </div>
  </nav>

  
    