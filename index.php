<?php
// LoadClass
function loadClass($class)
{
    require ($class.'.class.php');
}
spl_autoload_register('loadClass');
// Libmy
$db = new DBConnection();
$db->SetCredentials("root", « password »);
$db->Connect("localhost", "80");
$db->SelectDatabase("jquery");
$db->Execute("SELECT * FROM `users`");
$users_list = $db->GetResult();
$db->Disconnect();
// Page
Page::setTitle("Libmy Project - Web@cademie 2014");
Page::setAuthor("lounes_z");
Page::setKeywords('projet, libmy, webacademie, wac, epitech, zupdeco, mozaikrh');
Page::setLastMod('20121004');
// Page body
$page = Page::getBody();
$page->addAttribute('id', 'google');
// Head
$page->_body[0] = new HtmlElement();
$page->_body[0]->setTag('meta');
$page->_body[0]->addAttribute('http-equiv', 'Content-Type');
$page->_body[0]->addAttribute('content', 'text/html; charset=UTF-8');
$page->_body[1] = new HtmlElement();
$page->_body[1]->setTag('link');
$page->_body[1]->addAttribute('href', 'template.css');
$page->_body[1]->addAttribute('type', 'text/css');
$page->_body[1]->addAttribute('rel', 'stylesheet');
$page->_body[2] = new HtmlElement();
$page->_body[2]->setTag('link');
$page->_body[2]->addAttribute('href', 'bootstrap/css/bootstrap.css');
$page->_body[2]->addAttribute('type', 'text/css');
$page->_body[2]->addAttribute('rel', 'stylesheet');
// Google img
$page->_body[3] = new HtmlElement();
$page->_body[3]->setTag('div');
$page->_body[3]->addAttribute('class', 'img');
// Google link
$page->_body[4] = new HtmlLink();
$page->_body[4]->addAttribute('href', 'http://lmgtfy.com/');
$page->_body[4]->addAttribute('target', '_blank');
$page->_body[4]->addAttribute('class', 'rightlink');
$page->_body[4]->addContent('lmgtfy.com');
// Google paragraphe
$page->_body[5] = new HtmlParagraph();
$page->_body[5]->addAttribute('class', 'paragraph marginTop');
$page->_body[5]->addContent('<br />Let me google that for you<br />'.$page->_body[4]->toHtml());
// Google div
$page->_body[6] = new HtmlElement();
$page->_body[6]->setTag('div');
$page->_body[6]->addAttribute('class', 'div');
$page->_body[6]->addContent($page->_body[3]->toHtml().$page->_body[5]->toHtml());
$page->_body[6]->toBody();
// TAB of users
$page->_body[7] = new HtmlUsers();
$page->_body[7]->setCaption('Members of jQuery Project');
$page->_body[7]->addAttribute('class', 'table table-hover');
$page->_body[7]->makeListTab($users_list);
// Div of users tab
$page->_body[8] = new HtmlElement();
$page->_body[8]->setTag('div');
$page->_body[8]->addAttribute('class', 'div');
$page->_body[8]->addContent($page->_body[7]->toHtml());
$page->_body[8]->toBody();
// MENU
// icon home
$page->_body[9] = new HtmlElement();
$page->_body[9]->setTag('i');
$page->_body[9]->addAttribute('class', 'icon-home icon-white');
// Href icon home
$page->_body[10] = new HtmlLink();
$page->_body[10]->addAttribute('href', '#');
$page->_body[10]->addContent($page->_body[9]->toHtml()." Home");
// Li href icon home
$page->_body[11] = new HtmlListItem();
$page->_body[11]->addAttribute('class', 'active');
$page->_body[11]->addContent($page->_body[10]->toHtml());
// icon book
$page->_body[12] = new HtmlElement();
$page->_body[12]->setTag('i');
$page->_body[12]->addAttribute('class', 'icon-book');
// Href icon book
$page->_body[13] = new HtmlLink();
$page->_body[13]->addAttribute('href', '#');
$page->_body[13]->addContent($page->_body[12]->toHtml()." Library");
// Li href icon book
$page->_body[14] = new HtmlListItem();
$page->_body[14]->addContent($page->_body[13]->toHtml());
// icon pencil
$page->_body[15] = new HtmlElement();
$page->_body[15]->setTag('i');
$page->_body[15]->addAttribute('class', 'icon-pencil');
// Href icon pencil
$page->_body[16] = new HtmlLink();
$page->_body[16]->addAttribute('href', '#');
$page->_body[16]->addContent($page->_body[15]->toHtml()." Applications");
// Li icon pencil
$page->_body[17] = new HtmlListItem();
$page->_body[17]->addContent($page->_body[16]->toHtml());
// no icon
$page->_body[18] = new HtmlElement();
$page->_body[18]->setTag('i');
$page->_body[18]->addAttribute('class', 'i');
// Href no icon
$page->_body[19] = new HtmlLink();
$page->_body[19]->addAttribute('href', '#');
$page->_body[19]->addContent($page->_body[18]->toHtml()." Misc");
// Li href no icon
$page->_body[20] = new HtmlListItem();
$page->_body[20]->addContent($page->_body[19]->toHtml());
// Ul Menu
$page->_body[21] = new HtmlList();
$page->_body[21]->addAttribute('class', 'nav nav-list');
$page->_body[21]->addItem($page->_body[11]);
$page->_body[21]->addItem($page->_body[14]);
$page->_body[21]->addItem($page->_body[17]);
$page->_body[21]->addItem($page->_body[20]);
// Div Menu
$page->_body[22] = new HtmlElement();
$page->_body[22]->setTag('div');
$page->_body[22]->addAttribute('class', 'div');
$page->_body[22]->addContent($page->_body[21]->toHtml());
$page->_body[22]->toBody();
// Affichage html
echo $page->getBody();
?>