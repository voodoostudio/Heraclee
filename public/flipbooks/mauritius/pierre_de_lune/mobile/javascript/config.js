﻿	var aliasConfig = {
appName : ["", "", ""],
totalPageCount : [],
largePageWidth : [],
largePageHeight : [],
normalPath : [],
largePath : [],
thumbPath : [],

ToolBarsSettings:[],
TitleBar:[],
appLogoIcon:["appLogoIcon"],
appLogoLinkURL:["appLogoLinkURL"],
bookTitle : [],
bookDescription : [],
ButtonsBar : [],
ShareButton : [],
ShareButtonVisible : ["socialShareButtonVisible"],
ThumbnailsButton : [],
ThumbnailsButtonVisible : ["enableThumbnail"],
ZoomButton : [],
ZoomButtonVisible : ["enableZoomIn"],
FlashDisplaySettings : [],
MainBgConfig : [],
bgBeginColor : ["bgBeginColor"],
bgEndColor : ["bgEndColor"],
bgMRotation : ["bgMRotation"],
backGroundImgURL : ["mainbgImgUrl","innerMainbgImgUrl"],
pageBackgroundColor : ["pageBackgroundColor"],
flipshortcutbutton : [],
BookMargins : [],
topMargin : [],
bottomMargin : [],
leftMargin : [],
rightMargin : [],
HTMLControlSettings : [],
linkconfig : [],
LinkDownColor : ["linkOverColor"],
LinkAlpha : ["linkOverColorAlpha"],
OpenWindow : ["linkOpenedWindow"],
searchColor : [],
searchAlpha : [],
SearchButtonVisible : ["searchButtonVisible"],

productName : [],
homePage : [],
enableAutoPlay : ["autoPlayAutoStart"],
autoPlayDuration : ["autoPlayDuration"],
autoPlayLoopCount : ["autoPlayLoopCount"],
BookMarkButtonVisible : [],
googleAnalyticsID : ["googleAnalyticsID"],
OriginPageIndex : [],	
HardPageEnable : ["isHardCover"],	
UIBaseURL : [],	
RightToLeft: ["isRightToLeft"],	

LeftShadowWidth : ["leftPageShadowWidth"],	
LeftShadowAlpha : ["pageShadowAlpha"],
RightShadowWidth : ["rightPageShadowWidth"],
RightShadowAlpha : ["pageShadowAlpha"],
ShortcutButtonHeight : [],	
ShortcutButtonWidth : [],
AutoPlayButtonVisible : ["enableAutoPlay"],	
DownloadButtonVisible : ["enableDownload"],	
DownloadURL : ["downloadURL"],
HomeButtonVisible :["homeButtonVisible"],
HomeURL:['btnHomeURL'],
BackgroundSoundURL:['bacgroundSoundURL'],
//TableOfContentButtonVisible:["BookMarkButtonVisible"],
PrintButtonVisible:["enablePrint"],
toolbarColor:["mainColor","barColor"],
loadingBackground:["mainColor","barColor"],
BackgroundSoundButtonVisible:["enableFlipSound"],
FlipSound:["enableFlipSound"],
MiniStyle:["userSmallMode"],
retainBookCenter:["moveFlipBookToCenter"],
totalPagesCaption:["totalPageNumberCaptionStr"],
pageNumberCaption:["pageIndexCaptionStrs"]
};
var aliasLanguage={
frmPrintbtn:["frmPrintCaption"],
frmPrintall : ["frmPrintPrintAll"],
frmPrintcurrent : ["frmPrintPrintCurrentPage"],
frmPrintRange : ["frmPrintPrintRange"],
frmPrintexample : ["frmPrintExampleCaption"],
btnLanguage:["btnSwicthLanguage"],
btnTableOfContent:["btnBookMark"]
}
;
	var bookConfig = {
	appName:'flippdf',
	totalPageCount : 0,
	largePageWidth : 1080,
	largePageHeight : 1440,
	normalPath : "files/page/",
	largePath : "files/large/",
	thumbPath : "files/thumb/",
	
	ToolBarsSettings:"",
	TitleBar:"",
	appLogoLinkURL:"",
	bookTitle:"FLIPBUILDER",
	bookDescription:"",
	ButtonsBar:"",
	ShareButton:"",
	
	ThumbnailsButton:"",
	ThumbnailsButtonVisible:"Show",
	ZoomButton:"",
	ZoomButtonVisible:"Yes",
	FlashDisplaySettings:"",
	MainBgConfig:"",
	bgBeginColor:"#cccccc",
	bgEndColor:"#eeeeee",
	bgMRotation:45,
	pageBackgroundColor:"#FFFFFF",
	flipshortcutbutton:"Show",
	BookMargins:"",
	topMargin:10,
	bottomMargin:10,
	leftMargin:10,
	rightMargin:10,
	HTMLControlSettings:"",
	linkconfig:"",
	LinkDownColor:"#808080",
	LinkAlpha:0.5,
	OpenWindow:"_Blank",

	BookMarkButtonVisible:'true',
	productName : 'Demo created by Flip PDF',
	homePage : 'http://www.flipbuilder.com/',
	isFlipPdf : "true",
	TableOfContentButtonVisible:"true",
	searchTextJS:'javascript/search_config.js',
	searchPositionJS:undefined
};
	
	
	
bookConfig.loadingCaption="Loading";
bookConfig.loadingCaptionColor="#DDDDDD";
bookConfig.loadingBackground="#272727";
bookConfig.appLogoIcon="../files/mobile-ext/appLogoIcon.png";
bookConfig.appLogoOpenWindow="Blank";
bookConfig.logoHeight="0";
bookConfig.logoPadding="0";
bookConfig.logoTop="0";
bookConfig.toolbarColor="#272727";
bookConfig.iconColor="#ECF5FB";
bookConfig.pageNumColor="#272727";
bookConfig.iconFontColor="#FFFFFF";
bookConfig.toolbarAlwaysShow="No";
bookConfig.InstructionsButtonVisible="NO";
bookConfig.QRCode="Hide";
bookConfig.HomeButtonVisible="Hide";
bookConfig.enablePageBack="Show";
bookConfig.ShareButtonVisible="NO";
bookConfig.EmailButtonVisible="NO";
bookConfig.btnShareWithEmailBody="\{link\}";
bookConfig.ThumbnailsButtonVisible="Show";
bookConfig.thumbnailColor="#333333";
bookConfig.thumbnailAlpha="70";
bookConfig.BookMarkButtonVisible="Hide";
bookConfig.TableOfContentButtonVisible="NO";
bookConfig.bookmarkBackground="#272727";
bookConfig.bookmarkFontColor="#CCCCCC";
bookConfig.SearchButtonVisible="Show";
bookConfig.leastSearchChar="3";
bookConfig.searchFontColor="#FFFFFF";
bookConfig.searchHightlightColor="#FEFF0A";
bookConfig.SelectTextButtonVisible="Hide";
bookConfig.PrintButtonVisible="NO";
bookConfig.BackgroundSoundButtonVisible="NO";
bookConfig.FlipSound="YES";
bookConfig.BackgroundSoundURL="";
bookConfig.BackgroundSoundLoop="-1";
bookConfig.AutoPlayButtonVisible="Yes";
bookConfig.autoPlayAutoStart="No";
bookConfig.autoPlayDuration="9";
bookConfig.autoPlayLoopCount="1";
bookConfig.ZoomButtonVisible="Yes";
bookConfig.minZoomWidth="700";
bookConfig.minZoomHeight="518";
bookConfig.mouseWheelFlip="Yes";
bookConfig.DownloadButtonVisible="NO";
bookConfig.PhoneButtonVisible="Hide";
bookConfig.AnnotationButtonVisible="Hide";
bookConfig.FullscreenButtonVisible="NO";
bookConfig.bgBeginColor="#272727";
bookConfig.bgEndColor="#272727";
bookConfig.bgMRotation="90";
bookConfig.backgroundPosition="Stretch";
bookConfig.backgroundOpacity="100";
bookConfig.LeftShadowWidth="90";
bookConfig.LeftShadowAlpha="0.6";
bookConfig.RightShadowWidth="55";
bookConfig.RightShadowAlpha="0.6";
bookConfig.ShowTopLeftShadow="Yes";
bookConfig.HardPageEnable="No";
bookConfig.hardCoverBorderWidth="8";
bookConfig.borderColor="#572F0D";
bookConfig.outerCoverBorder="Yes";
bookConfig.cornerRound="8";
bookConfig.leftMarginOnMobile="0";
bookConfig.topMarginOnMobile="0";
bookConfig.rightMarginOnMobile="0";
bookConfig.bottomMarginOnMobile="0";
bookConfig.pageBackgroundColor="#FFFFFF";
bookConfig.flipshortcutbutton="Show";
bookConfig.BindingType="side";
bookConfig.RightToLeft="No";
bookConfig.flippingTime="0.3";
bookConfig.retainBookCenter="Yes";
bookConfig.FlipStyle="Flip";
bookConfig.autoDoublePage="Yes";
bookConfig.thicknessWidthType="Thinner";
bookConfig.thicknessColor="#FFFFFF";
bookConfig.topMargin="10";
bookConfig.bottomMargin="10";
bookConfig.leftMargin="10";
bookConfig.rightMargin="10";
bookConfig.maxWidthToSmallMode="400";
bookConfig.maxHeightToSmallMode="300";
bookConfig.LinkDownColor="#800080";
bookConfig.LinkAlpha="0.2";
bookConfig.OpenWindow="Blank";
bookConfig.showLinkHint="No";

bookConfig.macBookVersion = "GOdbirMKXXhkFNRRhkEJcSqkGBcdnlHGTWhjKEaWupPFYRkoNNWZmnHJXfkgNJcWgvEHXXipBOUZlpNNZajgOGQX26b2D068_";
bookConfig.Html5Template = "Metro";
bookConfig.searchTextJS="javascript/search_config.js";
bookConfig.searchPositionJS="javascript/text_position[1].js";
bookConfig.totalPageCount=32;
bookConfig.largePageWidth=841;
bookConfig.largePageHeight=595;
bookConfig.bookTitle="Pierre de Lune";
bookConfig.normalPath="../files/mobile/";
bookConfig.largePath="../files/mobile/";
bookConfig.productName="Flip PDF";
bookConfig.MidBgColor="#0637d5";
bookConfig.bookmarkCR = "2623128685dfad73c5e8a24b09408168c919964f";
;function orgt(s){ return binl2hex(core_hx(str2binl(s), s.length * chrsz));};
bookConfig.thumbPath="../files/thumb/";
var language=[{"language" : "French","btnFirstPage" : "Première page","btnNextPage" : "Page suivante","btnLastPage" : "Dernière page","btnPrePage" : "Page précédente","btnDownload" : "Télécharger","btnPrint" : "Imprimer","btnSearch" : "Recherche","btnClearSearch" : "Vider","frmSearchPrompt" : "Clear","btnBookMark" : "Table des matières","btnHelp" : "Aide","btnHome" : "Home","btnFullScreen" : "Plein écran","btnDisableFullScreen" : "Fenêtre","btnSoundOn" : "Son","btnSoundOff" : "Muet","btnShareEmail" : "Partager","btnSocialShare" : "Réseaux sociaux","btnZoomIn" : "Zoom en","btnZoomOut" : "Zoom hors","btnDragToMove" : "Drag move mode","btnAutoFlip" : "Auto Flip","btnStopAutoFlip" : "Stop Auto Flip","btnGoToHome" : "Début","frmHelpCaption" : "Aide","frmHelpTip1" : "Double click pour zoom In ou OUT","frmHelpTip2" : "Tirer sur le coin de page","frmPrintCaption" : "Imprimer","frmPrintBtnCaption" : "Imprimer","frmPrintPrintAll" : "Imprimer toutes les pages","frmPrintPrintCurrentPage" : "Imprimer la page actuelle","frmPrintPrintRange" : "Print Range","frmPrintExampleCaption" : "Exemple: 2,5,8-26","frmPrintPreparePage" : "Préparation de la page :","frmPrintPrintFailed" : "Défaillance de l'impression","pnlSearchInputInvalid" : "(La requette minimale et de 3 caractères","loginCaption" : "Connexion","loginInvalidPassword" : "Mot de passe invalide","loginPasswordLabel" : "Mot de passe :","loginBtnLogin" : "Connexion","loginBtnCancel" : "Annuler","btnThumb" : "Thumbnails","lblPages" : "Pages :","lblPagesFound" : "Pages :","lblPageIndex" : "Page","btnAbout" : "A propos","frnAboutCaption" : "A propos et contact","btnSinglePage" : "Page simple","btnDoublePage" : "Double page","btnSwicthLanguage" : "Changer de langue","tipChangeLanguage" : "SVP sélectionnez la langue ci-contre","btnMoreOptionsLeft" : "Plus d'options","btnMoreOptionsRight" : "Plus d'options","btnFit" : "Ajuster à la fenêtre","smallModeCaption" : "Cliquez pour voir en plein écran","btnAddAnnotation" : "Ajouter Annotations","btnAnnotation" : "Annotations","FlipPageEditor_SaveAndExit" : "Sauvegardez et quittez","FlipPageEditor_Exit" : "Quitter","DrawToolWindow_Redo" : "Refaire","DrawToolWindow_Undo" : "Annuler","DrawToolWindow_Clear" : "Vider","DrawToolWindow_Brush" : "Brosse","DrawToolWindow_Width" : "Largeur ","DrawToolWindow_Alpha" : "Alpha","DrawToolWindow_Color" : "Couleur","DrawToolWindow_Eraser" : "Gomme","DrawToolWindow_Rectangular" : "Rectangulaire","DrawToolWindow_Ellipse" : "Ellipse","TStuff_BorderWidth" : "Bordure Largeur","TStuff_BorderAlph" : "Bordure Alpha","TStuff_BorderColor" : "Bordure Couleur","DrawToolWindow_TextNote" : "Text Note","AnnotMark" : "Marque page","lastpagebtnHelp" : "Dernière page","firstpagebtnHelp" : "Première page","homebtnHelp" : "Retour à la page d'accueil","aboubtnHelp" : "À propos","screenbtnHelp" : "Ouvrez cette application dans une fenêtre plein","helpbtnHelp" : "Ouvrez la fenêtre d'aide","searchbtnHelp" : "Recherche de pages","pagesbtnHelp" : "Jetez un oeil à la miniaturede cette brochure","bookmarkbtnHelp" : "Ouvrez un marque-page","AnnotmarkbtnHelp" : "Ouvrez Table des matières","printbtnHelp" : "Imprimer la brochure","soundbtnHelp" : "Activer ou désactiver le son","sharebtnHelp" : "Envoyer un message","socialSharebtnHelp" : "Envoyer un message","zoominbtnHelp" : "Zoomer","downloadbtnHelp" : "Télécharger la brochure","pagemodlebtnHelp" : "Page Uniqe et double","languagebtnHelp" : "Mettez Lauguage","annotationbtnHelp" : "Ajouter des Annotations","addbookmarkbtnHelp" : "Ajouter Marque-page","removebookmarkbtnHelp" : "Supprimer Marque-page","updatebookmarkbtnHelp" : "Mettre à jour Marque-page","btnShoppingCart" : "Panier d'Achat","Help_ShoppingCartbtn" : "Panier d'Achat","Help_btnNextPage" : "Page Suivante","Help_btnPrePage" : "Page Précédente","Help_btnAutoFlip" : "Auto filp","Help_StopAutoFlip" : "Arrêter atuo filp","btnaddbookmark" : "Ajouter","btndeletebookmark" : "Supprimer","btnupdatebookmark" : "Mettre à Jour","frmyourbookmarks" : "Vos marque-pages","frmitems" : "articles","DownloadFullPublication" : "Publication Complète ","DownloadCurrentPage" : "Page Actuelle","DownloadAttachedFiles" : "Fichiers Joints","lblLink" : "Lien","btnCopy" : "Copier Bouton","infCopyToClipboard" : "Your browser does not support clipboard. ","restorePage" : "Voulez-vous restaurer la session précédente","tmpl_Backgoundsoundon" : "Acitver Son de Fond","tmpl_Backgoundsoundoff" : "Désactiver Son de Fond","tmpl_Flipsoundon" : "Acitver Son de Flip","tmpl_Flipsoundoff" : "Désactiver Son de Flip","Help_PageIndex" : "Le numéro de la page actuelle","tmpl_PrintPageRanges" : "Intervalle de Pages","tmpl_PrintPreview" : "Pré-visualiser","btnSelection" : "Sélectionnez Texte","loginNameLabel" : "Nom:","btnGotoPage" : "Aller","btnSettings" : "Paramètres","soundSettingTitle" : "Paramètres de Son","closeFlipSound" : "Fermer Son de Flip","closeBackgroundSound" : "Fermer Son de Fond","frmShareCaption" : "Partager","frmShareLinkLabel" : "Lien:","frmShareBtnCopy" : "Copier","frmShareItemsGroupCaption" : "Partager sur Réseaux Sociaux","TAnnoActionPropertyStuff_GotoPage" : "Aller à La Page","btnPageBack" : "Reculer","btnPageForward" : "Avancer","SelectTextCopy" : "Copier Texte","selectCopyButton" : "Copier","TStuffCart_TypeCart" : "Panier d'Achat","TStuffCart_DetailedQuantity" : "Quantité ","TStuffCart_DetailedPrice" : "Prix","ShappingCart_Close" : "Fermer","ShappingCart_CheckOut" : "Caisse","ShappingCart_Item" : "Article","ShappingCart_Total" : "Total","ShappingCart_AddCart" : "Ajouter au Panier","ShappingCart_InStock" : "en Stock","TStuffCart_DetailedCost" : "Livraison","TStuffCart_DetailedTime" : "Délai de livraison","TStuffCart_DetailedDay" : "jour(s)","ShappingCart_NotStock" : "Not enough en stock","btnCrop" : "Couper","btnDragButton" : "Drag","btnFlipBook" : "Flip Book","btnSlideMode" : "Slide Mode","btnSinglePageMode" : "Single Page Mode","btnVertical" : "Vertical Mode","btnHotizontal" : "Horizontal Mode","btnClose" : "Close","btnDoublePage" : "Double Page","btnBookStatus" : "Book View","checkBoxInsert" : "Insérer cette page","lblLast" : "Ceci est la dernière page.","lblFirst" : "Ceci est la première page.","lblFullscreen" : "Cliquez pour voir en plein écran","lblName" : "nom","lblPassword" : "Mot de passe","lblLogin" : "S'identifier","lblCancel" : "annuler","lblNoName" : "Nom d'utilisateur ne peut pas être vide.","lblNoPassword" : "Mot de passe ne peut pas être vide.","lblNoCorrectLogin" : "S'il vous plaît entrez le nom d'utilisateur et mot de passe.","btnVideo" : "Galerie Vidéo","btnSlideShow" : "diaporama","pnlSearchInputInvalid" : "The search text is too short.","btnDragToMove" : "Move by mouse drag","btnPositionToMove" : "Move de position de la souris","lblHelp1" : "Faites glisser le coin de la page pour voir","lblHelp2" : "Double-cliquez pour zoomer, sur","lblCopy" : "copie","lblAddToPage" : "ajouter à la page","lblPage" : "page","lblTitle" : "Titre","lblEdit" : "Modifier","lblDelete" : "Effacer","lblRemoveAll" : "Enlever tout","tltCursor" : "curseur","tltAddHighlight" : "ajouter clou","tltAddTexts" : "ajouter des textes","tltAddShapes" : "ajouter des formes","tltAddNotes" : "ajouter des notes","tltAddImageFile" : "ajouter fichier image","tltAddSignature" : "ajouter la signature","tltAddLine" : "ajouter la ligne","tltAddArrow" : "ajouter flèche","tltAddRect" : "ajouter rect","tltAddEllipse" : "ajouter ellipse","lblDoubleClickToZoomIn" : "Double-cliquez pour agrandir.","frmShareCaption" : "Share","frmShareLabel" : "Share","frmShareInfo" : "You can easily share this publication to social networks.Just cilck the appropriate button below.","frminsertLabel" : "Insert to Site","frminsertInfo" : "Use the code below to embed this publication to your website.","btnQRCode" : "Click to scan QR code","btnRotateLeft" : "Rotate Left","btnRotateRight" : "Rotate Right","lblSelectMode" : "Select view mode please.","frmDownloadPreview" : "Preview","frmHowToUse" : "How To Use","lblHelpPage1" : "Move your finger to flip the book page.","lblHelpPage2" : "Zoom in by using gesture or double click on the page.","lblHelpPage3" : "Click on the logo to reach the official website of the company.","lblHelpPage4" : "Add bookmarks, use search function and auto flip the book.","lblHelpPage5" : "Switch horizontal and vertical view on mobile devices.","TTActionQuiz_PlayAgain" : "Do you wanna play it again","TTActionQuiz_Ration" : "Your ratio is","frmTelephone" : "Telephone list","btnDialing" : "Dialing","lblSelectMessage" : "Please copy the the text content in the text box","btnSelectText" : "Select Text","btnNote" : "Annotation","btnPhoneNumber" : "Telephone"},{"language" : "English","btnFirstPage" : "First","btnNextPage" : "Next Page","btnLastPage" : "Last","btnPrePage" : "Previous Page","btnDownload" : "Download","btnPrint" : "Print","btnSearch" : "Search","btnClearSearch" : "Clear","frmSearchPrompt" : "Clear","btnBookMark" : "Table of content","btnHelp" : "Help","btnHome" : "Home","btnFullScreen" : "Enable FullScreen","btnDisableFullScreen" : "Disable FullScreen","btnSoundOn" : "Sound On","btnSoundOff" : "Sound Off","btnShareEmail" : "Share","btnSocialShare" : "Social Share","btnZoomIn" : "Zoom In","btnZoomOut" : "Zoom Out","btnDragToMove" : "Move by mouse drag","btnAutoFlip" : "Auto Flip","btnStopAutoFlip" : "Stop Auto Flip","btnGoToHome" : "Return Home","frmHelpCaption" : "Help","frmHelpTip1" : "Double click to zoom in or out","frmHelpTip2" : "Drag the page corner to view","frmPrintCaption" : "Print","frmPrintBtnCaption" : "Print","frmPrintPrintAll" : "Print All Pages","frmPrintPrintCurrentPage" : "Print Current Page","frmPrintPrintRange" : "Print Range","frmPrintExampleCaption" : "Example: 2,5,8-26","frmPrintPreparePage" : "Preparing Page:","frmPrintPrintFailed" : "Print Failed:","pnlSearchInputInvalid" : "The search text is too short.","loginCaption" : "Login","loginInvalidPassword" : "Not a valid password!","loginPasswordLabel" : "Password:","loginBtnLogin" : "Login","loginBtnCancel" : "Cancel","btnThumb" : "Thumbnails","lblPages" : "Pages:","lblPagesFound" : "Pages:","lblPageIndex" : "Page","btnAbout" : "About","frnAboutCaption" : "About & Contact","btnSinglePage" : "Single Page","btnDoublePage" : "Double Page","btnSwicthLanguage" : "Switch Language","tipChangeLanguage" : "Please select a language below...","btnMoreOptionsLeft" : "More Options","btnMoreOptionsRight" : "More Options","btnFit" : "Fit Window","smallModeCaption" : "Click to view in fullscreen","btnAddAnnotation" : "Add Annotations","btnAnnotation" : "Annotations","FlipPageEditor_SaveAndExit" : "Save and Exit","FlipPageEditor_Exit" : "Exit","DrawToolWindow_Redo" : "Redo","DrawToolWindow_Undo" : "Undo","DrawToolWindow_Clear" : "Clear","DrawToolWindow_Brush" : "Brush","DrawToolWindow_Width" : "Width","DrawToolWindow_Alpha" : "Alpha","DrawToolWindow_Color" : "Color","DrawToolWindow_Eraser" : "Eraser","DrawToolWindow_Rectangular" : "Rectangular","DrawToolWindow_Ellipse" : "Ellipse","TStuff_BorderWidth" : "Border Width","TStuff_BorderAlph" : "Border Alpha","TStuff_BorderColor" : "Border Color","DrawToolWindow_TextNote" : "Text Note","AnnotMark" : "Book Mark","lastpagebtnHelp" : "Last page","firstpagebtnHelp" : "First page","homebtnHelp" : "Return to home page","aboubtnHelp" : "About","screenbtnHelp" : "Open this application in full-screen mode","helpbtnHelp" : "Show help","searchbtnHelp" : "Search from pages","pagesbtnHelp" : "Take a look at the thumbnail of this brochure","bookmarkbtnHelp" : "Open Bookmark","AnnotmarkbtnHelp" : "Open Table of content","printbtnHelp" : "Print the brochure","soundbtnHelp" : "Turn on or off the sound","sharebtnHelp" : "Send Email to","socialSharebtnHelp" : "Social Share","zoominbtnHelp" : "Zoom in","downloadbtnHelp" : "Downdlaod this brochure","pagemodlebtnHelp" : "Switch Single and double page mode","languagebtnHelp" : "Switch Lauguage","annotationbtnHelp" : "Add Annotation","addbookmarkbtnHelp" : "Add Bookmark","removebookmarkbtnHelp" : "Remove BookMark","updatebookmarkbtnHelp" : "Update Bookmark","btnShoppingCart" : "Shopping Cart","Help_ShoppingCartbtn" : "Shopping Cart","Help_btnNextPage" : "Next page","Help_btnPrePage" : "Previous page","Help_btnAutoFlip" : "Auto filp","Help_StopAutoFlip" : "Stop atuo filp","btnaddbookmark" : "Add","btndeletebookmark" : "Delete","btnupdatebookmark" : "Update","frmyourbookmarks" : "Your bookmarks","frmitems" : "items","DownloadFullPublication" : "Full Publication","DownloadCurrentPage" : "Current Page","DownloadAttachedFiles" : "Attached Files","lblLink" : "Link","btnCopy" : "Copy Button","infCopyToClipboard" : "Your browser does not support clipboard. ","restorePage" : "Would you like to restore previous session","tmpl_Backgoundsoundon" : "Background Sound On","tmpl_Backgoundsoundoff" : "Background Sound Off","tmpl_Flipsoundon" : "Flip Sound On","tmpl_Flipsoundoff" : "Flip Sound Off","Help_PageIndex" : "The current page number","tmpl_PrintPageRanges" : "PAGE RANGES","tmpl_PrintPreview" : "PREVIEW","btnSelection" : "Select Text","loginNameLabel" : "Name:","btnGotoPage" : "Go","btnSettings" : "Setting","soundSettingTitle" : "Sound Setting","closeFlipSound" : "Close Flip Sound","closeBackgroundSound" : "Close Backgorund Sound","frmShareCaption" : "Share","frmShareLinkLabel" : "Link:","frmShareBtnCopy" : "Copy","frmShareItemsGroupCaption" : "Social Share","TAnnoActionPropertyStuff_GotoPage" : "Go to page","btnPageBack" : "Backward","btnPageForward" : "Forward","SelectTextCopy" : "Copy Selected Text","selectCopyButton" : "Copy","TStuffCart_TypeCart" : "Shopping Cart","TStuffCart_DetailedQuantity" : "Quantity","TStuffCart_DetailedPrice" : "Price","ShappingCart_Close" : "Close","ShappingCart_CheckOut" : "Checkout","ShappingCart_Item" : "Item","ShappingCart_Total" : "Total","ShappingCart_AddCart" : "Add to cart","ShappingCart_InStock" : "In Stock","TStuffCart_DetailedCost" : "Shipping cost","TStuffCart_DetailedTime" : "Delivery time","TStuffCart_DetailedDay" : "day(s)","ShappingCart_NotStock" : "Not enough in stock","btnCrop" : "Crop","btnDragButton" : "Drag","btnFlipBook" : "Flip Book","btnSlideMode" : "Slide Mode","btnSinglePageMode" : "Single Page Mode","btnVertical" : "Vertical Mode","btnHotizontal" : "Horizontal Mode","btnClose" : "Close","btnDoublePage" : "Double Page","btnBookStatus" : "Book View","checkBoxInsert" : "Insert Current Page","lblLast" : "This is the last page.","lblFirst" : "This is the first page.","lblFullscreen" : "Click to view in fullscreen","lblName" : "Name","lblPassword" : "Password","lblLogin" : "Login","lblCancel" : "Cancel","lblNoName" : "User name can not be empty.","lblNoPassword" : "Password can not be empty.","lblNoCorrectLogin" : "Please enter the correct user name and password.","btnVideo" : "Video Gallery","btnSlideShow" : "Slide Show","pnlSearchInputInvalid" : "The search text is too short.","btnDragToMove" : "Move by mouse drag","btnPositionToMove" : "Move by mouse position","lblHelp1" : "Drag the page corner to view","lblHelp2" : "Double click to zoom in, out","lblCopy" : "Copy","lblAddToPage" : "add to page","lblPage" : "Page","lblTitle" : "Title","lblEdit" : "Edit","lblDelete" : "Delete","lblRemoveAll" : "Remove All","tltCursor" : "cursor","tltAddHighlight" : "add highlight","tltAddTexts" : "add texts","tltAddShapes" : "add shapes","tltAddNotes" : "add notes","tltAddImageFile" : "add image file","tltAddSignature" : "add signature","tltAddLine" : "add line","tltAddArrow" : "add arrow","tltAddRect" : "add rect","tltAddEllipse" : "add ellipse","lblDoubleClickToZoomIn" : "Double click to zoom in.","frmShareCaption" : "Share","frmShareLabel" : "Share","frmShareInfo" : "You can easily share this publication to social networks.Just cilck the appropriate button below.","frminsertLabel" : "Insert to Site","frminsertInfo" : "Use the code below to embed this publication to your website.","btnQRCode" : "Click to scan QR code","btnRotateLeft" : "Rotate Left","btnRotateRight" : "Rotate Right","lblSelectMode" : "Select view mode please.","frmDownloadPreview" : "Preview","frmHowToUse" : "How To Use","lblHelpPage1" : "Move your finger to flip the book page.","lblHelpPage2" : "Zoom in by using gesture or double click on the page.","lblHelpPage3" : "Click on the logo to reach the official website of the company.","lblHelpPage4" : "Add bookmarks, use search function and auto flip the book.","lblHelpPage5" : "Switch horizontal and vertical view on mobile devices.","TTActionQuiz_PlayAgain" : "Do you wanna play it again","TTActionQuiz_Ration" : "Your ratio is","frmTelephone" : "Telephone list","btnDialing" : "Dialing","lblSelectMessage" : "Please copy the the text content in the text box","btnSelectText" : "Select Text","btnNote" : "Annotation","btnPhoneNumber" : "Telephone"}];var pageEditor =[[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[{annotype:"com.mobiano.flipbook.pageeditor.TAnnoLink",location:{x:"0.174186",y:"0.859182",width:"0.151627",height:"0.021610"},action:{triggerEventType:"mouseDown",actionType:"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL",url:"http://www.ile-maurice-pds.com"}},{annotype:"com.mobiano.flipbook.pageeditor.TAnnoLink",location:{x:"0.220753",y:"0.884662",width:"0.119300",height:"0.021610"},action:{triggerEventType:"mouseDown",actionType:"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL",url:"http://ile-maurice-pds.com"}}]]
;
	bookConfig.hideMiniFullscreen=true;
	if(language&&language.length>0&&language[0]&&language[0].language){
		bookConfig.language=language[0].language;
	}
	
try{
	for(var i=0;pageEditor!=undefined&&i<pageEditor.length;i++){
		if(pageEditor[i].length==0){
			continue;
		}
		for(var j=0;j<pageEditor[i].length;j++){
			var anno=pageEditor[i][j];
			if(anno==undefined)continue;
			if(anno.overAlpha==undefined){
				anno.overAlpha=bookConfig.LinkAlpha;
			}
			if(anno.outAlpha==undefined){
				anno.outAlpha=0;
			}
			if(anno.downAlpha==undefined){
				anno.downAlpha=bookConfig.LinkAlpha;
			}
			if(anno.overColor==undefined){
				anno.overColor=bookConfig.LinkDownColor;
			}
			if(anno.downColor==undefined){
				anno.downColor=bookConfig.LinkDownColor;
			}
			if(anno.outColor==undefined){
				anno.outColor=bookConfig.LinkDownColor;
			}
			if(anno.annotype=='com.mobiano.flipbook.pageeditor.TAnnoLink'){
				anno.alpha=bookConfig.LinkAlpha;
			}
		}
	}
}catch(e){
}
try{
	$.browser.device = 2;
}catch(ee){
}