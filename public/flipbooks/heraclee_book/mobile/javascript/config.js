	var aliasConfig = {
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
bookConfig.loadingBackground="#000000";
bookConfig.appLogoOpenWindow="Blank";
bookConfig.logoHeight="40";
bookConfig.logoPadding="0";
bookConfig.logoTop="0";
bookConfig.toolbarColor="#272727";
bookConfig.iconColor="#ECF5FB";
bookConfig.pageNumColor="#272727";
bookConfig.iconFontColor="#FFFFFF";
bookConfig.toolbarAlwaysShow="No";
bookConfig.InstructionsButtonVisible="Show";
bookConfig.showInstructionOnStart="No";
bookConfig.QRCode="Hide";
bookConfig.HomeButtonVisible="Hide";
bookConfig.enablePageBack="Show";
bookConfig.ShareButtonVisible="NO";
bookConfig.EmailButtonVisible="NO";
bookConfig.btnShareWithEmailBody="\{link\}";
bookConfig.ThumbnailsButtonVisible="Show";
bookConfig.thumbnailColor="#272727";
bookConfig.thumbnailAlpha="70";
bookConfig.BookMarkButtonVisible="Hide";
bookConfig.TableOfContentButtonVisible="NO";
bookConfig.bookmarkBackground="#272727";
bookConfig.bookmarkFontColor="#CCCCCC";
bookConfig.SearchButtonVisible="Show";
bookConfig.leastSearchChar="3";
bookConfig.searchFontColor="#FFFFFF";
bookConfig.searchHightlightColor="#CCCCCC";
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
bookConfig.DownloadButtonVisible="Hide";
bookConfig.PhoneButtonVisible="Hide";
bookConfig.AnnotationButtonVisible="Hide";
bookConfig.FullscreenButtonVisible="Show";
bookConfig.bgBeginColor="#E2E2E2";
bookConfig.bgEndColor="#E2E2E2";
bookConfig.bgMRotation="90";
bookConfig.backgroundPosition="Stretch";
bookConfig.backgroundOpacity="0";
bookConfig.LeftShadowWidth="90";
bookConfig.LeftShadowAlpha="0.6";
bookConfig.RightShadowWidth="55";
bookConfig.RightShadowAlpha="0.6";
bookConfig.ShowTopLeftShadow="Yes";
bookConfig.HardPageEnable="No";
bookConfig.hardCoverBorderWidth="0";
bookConfig.borderColor="#572F0D";
bookConfig.outerCoverBorder="NO";
bookConfig.cornerRound="8";
bookConfig.leftMarginOnMobile="0";
bookConfig.topMarginOnMobile="0";
bookConfig.rightMarginOnMobile="0";
bookConfig.bottomMarginOnMobile="0";
bookConfig.pageBackgroundColor="#E8E8E8";
bookConfig.flipshortcutbutton="Show";
bookConfig.BindingType="side";
bookConfig.RightToLeft="No";
bookConfig.flippingTime="0.3";
bookConfig.retainBookCenter="Yes";
bookConfig.FlipStyle="Flip";
bookConfig.autoDoublePage="No";
bookConfig.isTheBookOpen="No";
bookConfig.thicknessWidthType="Thinner";
bookConfig.thicknessColor="#FFFFFF";
bookConfig.topMargin="0";
bookConfig.bottomMargin="0";
bookConfig.leftMargin="0";
bookConfig.rightMargin="0";
bookConfig.maxWidthToSmallMode="400";
bookConfig.maxHeightToSmallMode="300";
bookConfig.leftRightPnlShowOption="None";
bookConfig.LinkDownColor="#CCAC83";
bookConfig.LinkAlpha="0.2";
bookConfig.OpenWindow="Blank";
bookConfig.showLinkHint="No";

bookConfig.macBookVersion = "OKWSpmEIZWmjDNYRmoABcYnhIEaasjOLSUpiMDTWujBCXctiJIRTsmDKTbplOOVfrjBGSbsjEITRsmCCaRvjKFeefb9151E2_";
bookConfig.Html5Template = "Metro";
bookConfig.searchTextJS="javascript/search_config.js";
bookConfig.searchPositionJS="javascript/text_position[1].js";
bookConfig.totalPageCount=10;
bookConfig.largePageWidth=598;
bookConfig.largePageHeight=425;
bookConfig.bookTitle="Livret Heraclee";
bookConfig.normalPath="../files/mobile/";
bookConfig.largePath="../files/mobile/";
bookConfig.productName="Flip PDF";
bookConfig.MidBgColor="#539054";
bookConfig.bookmarkCR = "25cf916ee8cec8a09fa79315aa5cdae6c3e4ef85";
;function orgt(s){ return binl2hex(core_hx(str2binl(s), s.length * chrsz));};
bookConfig.thumbPath="../files/thumb/";
var language=[{"language" : "French","btnFirstPage" : "Première page","btnNextPage" : "Page suivante","btnLastPage" : "Dernière page","btnPrePage" : "Page précédente","btnDownload" : "Télécharger","btnPrint" : "Imprimer","btnSearch" : "Recherche","btnClearSearch" : "Vider","frmSearchPrompt" : "Clear","btnBookMark" : "Table des matières","btnHelp" : "Aide","btnHome" : "Home","btnFullScreen" : "Plein écran","btnDisableFullScreen" : "Fenêtre","btnSoundOn" : "Son","btnSoundOff" : "Muet","btnShareEmail" : "Partager","btnSocialShare" : "Réseaux sociaux","btnZoomIn" : "Zoom en","btnZoomOut" : "Zoom hors","btnDragToMove" : "Drag move mode","btnAutoFlip" : "Auto Flip","btnStopAutoFlip" : "Stop Auto Flip","btnGoToHome" : "Début","frmHelpCaption" : "Aide","frmHelpTip1" : "Double click pour zoom In ou OUT","frmHelpTip2" : "Tirer sur le coin de page","frmPrintCaption" : "Imprimer","frmPrintBtnCaption" : "Imprimer","frmPrintPrintAll" : "Imprimer toutes les pages","frmPrintPrintCurrentPage" : "Imprimer la page actuelle","frmPrintPrintRange" : "Print Range","frmPrintExampleCaption" : "Exemple: 2,5,8-26","frmPrintPreparePage" : "Préparation de la page :","frmPrintPrintFailed" : "Défaillance de l'impression","pnlSearchInputInvalid" : "(La requette minimale et de 3 caractères","loginCaption" : "Connexion","loginInvalidPassword" : "Mot de passe invalide","loginPasswordLabel" : "Mot de passe :","loginBtnLogin" : "Connexion","loginBtnCancel" : "Annuler","btnThumb" : "Thumbnails","lblPages" : "Pages :","lblPagesFound" : "Pages :","lblPageIndex" : "Page","btnAbout" : "A propos","frnAboutCaption" : "A propos et contact","btnSinglePage" : "Page simple","btnDoublePage" : "Double page","btnSwicthLanguage" : "Changer de langue","tipChangeLanguage" : "SVP sélectionnez la langue ci-contre","btnMoreOptionsLeft" : "Plus d'options","btnMoreOptionsRight" : "Plus d'options","btnFit" : "Ajuster à la fenêtre","smallModeCaption" : "Cliquez pour voir en plein écran","btnAddAnnotation" : "Ajouter Annotations","btnAnnotation" : "Annotations","FlipPageEditor_SaveAndExit" : "Sauvegardez et quittez","FlipPageEditor_Exit" : "Quitter","DrawToolWindow_Redo" : "Refaire","DrawToolWindow_Undo" : "Annuler","DrawToolWindow_Clear" : "Vider","DrawToolWindow_Brush" : "Brosse","DrawToolWindow_Width" : "Largeur ","DrawToolWindow_Alpha" : "Alpha","DrawToolWindow_Color" : "Couleur","DrawToolWindow_Eraser" : "Gomme","DrawToolWindow_Rectangular" : "Rectangulaire","DrawToolWindow_Ellipse" : "Ellipse","TStuff_BorderWidth" : "Bordure Largeur","TStuff_BorderAlph" : "Bordure Alpha","TStuff_BorderColor" : "Bordure Couleur","DrawToolWindow_TextNote" : "Text Note","AnnotMark" : "Marque page","lastpagebtnHelp" : "Dernière page","firstpagebtnHelp" : "Première page","homebtnHelp" : "Retour à la page d'accueil","aboubtnHelp" : "À propos","screenbtnHelp" : "Ouvrez cette application dans une fenêtre plein","helpbtnHelp" : "Ouvrez la fenêtre d'aide","searchbtnHelp" : "Recherche de pages","pagesbtnHelp" : "Jetez un oeil à la miniaturede cette brochure","bookmarkbtnHelp" : "Ouvrez un marque-page","AnnotmarkbtnHelp" : "Ouvrez Table des matières","printbtnHelp" : "Imprimer la brochure","soundbtnHelp" : "Activer ou désactiver le son","sharebtnHelp" : "Envoyer un message","socialSharebtnHelp" : "Envoyer un message","zoominbtnHelp" : "Zoomer","downloadbtnHelp" : "Télécharger la brochure","pagemodlebtnHelp" : "Page Uniqe et double","languagebtnHelp" : "Mettez Lauguage","annotationbtnHelp" : "Ajouter des Annotations","addbookmarkbtnHelp" : "Ajouter Marque-page","removebookmarkbtnHelp" : "Supprimer Marque-page","updatebookmarkbtnHelp" : "Mettre à jour Marque-page","btnShoppingCart" : "Panier d'Achat","Help_ShoppingCartbtn" : "Panier d'Achat","Help_btnNextPage" : "Page Suivante","Help_btnPrePage" : "Page Précédente","Help_btnAutoFlip" : "Auto filp","Help_StopAutoFlip" : "Arrêter atuo filp","btnaddbookmark" : "Ajouter","btndeletebookmark" : "Supprimer","btnupdatebookmark" : "Mettre à Jour","frmyourbookmarks" : "Vos marque-pages","frmitems" : "articles","DownloadFullPublication" : "Publication Complète ","DownloadCurrentPage" : "Page Actuelle","DownloadAttachedFiles" : "Fichiers Joints","lblLink" : "Lien","btnCopy" : "Copier Bouton","infCopyToClipboard" : "Your browser does not support clipboard. ","restorePage" : "Voulez-vous restaurer la session précédente","tmpl_Backgoundsoundon" : "Acitver Son de Fond","tmpl_Backgoundsoundoff" : "Désactiver Son de Fond","tmpl_Flipsoundon" : "Acitver Son de Flip","tmpl_Flipsoundoff" : "Désactiver Son de Flip","Help_PageIndex" : "Le numéro de la page actuelle","tmpl_PrintPageRanges" : "Intervalle de Pages","tmpl_PrintPreview" : "Pré-visualiser","btnSelection" : "Sélectionnez Texte","loginNameLabel" : "Nom:","btnGotoPage" : "Aller","btnSettings" : "Paramètres","soundSettingTitle" : "Paramètres de Son","closeFlipSound" : "Fermer Son de Flip","closeBackgroundSound" : "Fermer Son de Fond","frmShareCaption" : "Partager","frmShareLinkLabel" : "Lien:","frmShareBtnCopy" : "Copier","frmShareItemsGroupCaption" : "Partager sur Réseaux Sociaux","TAnnoActionPropertyStuff_GotoPage" : "Aller à La Page","btnPageBack" : "Reculer","btnPageForward" : "Avancer","SelectTextCopy" : "Copier Texte","selectCopyButton" : "Copier","TStuffCart_TypeCart" : "Panier d'Achat","TStuffCart_DetailedQuantity" : "Quantité ","TStuffCart_DetailedPrice" : "Prix","ShappingCart_Close" : "Fermer","ShappingCart_CheckOut" : "Caisse","ShappingCart_Item" : "Article","ShappingCart_Total" : "Total","ShappingCart_AddCart" : "Ajouter au Panier","ShappingCart_InStock" : "en Stock","TStuffCart_DetailedCost" : "Livraison","TStuffCart_DetailedTime" : "Délai de livraison","TStuffCart_DetailedDay" : "jour(s)","ShappingCart_NotStock" : "Not enough en stock","btnCrop" : "Couper","btnDragButton" : "Drag","btnFlipBook" : "Flip Book","btnSlideMode" : "Slide Mode","btnSinglePageMode" : "Single Page Mode","btnVertical" : "Vertical Mode","btnHotizontal" : "Horizontal Mode","btnClose" : "Close","btnDoublePage" : "Double Page","btnBookStatus" : "Book View","checkBoxInsert" : "Insérer cette page","lblLast" : "Ceci est la dernière page.","lblFirst" : "Ceci est la première page.","lblFullscreen" : "Cliquez pour voir en plein écran","lblName" : "nom","lblPassword" : "Mot de passe","lblLogin" : "S'identifier","lblCancel" : "annuler","lblNoName" : "Nom d'utilisateur ne peut pas être vide.","lblNoPassword" : "Mot de passe ne peut pas être vide.","lblNoCorrectLogin" : "S'il vous plaît entrez le nom d'utilisateur et mot de passe.","btnVideo" : "Galerie Vidéo","btnSlideShow" : "diaporama","pnlSearchInputInvalid" : "The search text is too short.","btnDragToMove" : "Move by mouse drag","btnPositionToMove" : "Move de position de la souris","lblHelp1" : "Faites glisser le coin de la page pour voir","lblHelp2" : "Double-cliquez pour zoomer, sur","lblCopy" : "copie","lblAddToPage" : "ajouter à la page","lblPage" : "page","lblTitle" : "Titre","lblEdit" : "Modifier","lblDelete" : "Effacer","lblRemoveAll" : "Enlever tout","tltCursor" : "curseur","tltAddHighlight" : "ajouter clou","tltAddTexts" : "ajouter des textes","tltAddShapes" : "ajouter des formes","tltAddNotes" : "ajouter des notes","tltAddImageFile" : "ajouter fichier image","tltAddSignature" : "ajouter la signature","tltAddLine" : "ajouter la ligne","tltAddArrow" : "ajouter flèche","tltAddRect" : "ajouter rect","tltAddEllipse" : "ajouter ellipse","lblDoubleClickToZoomIn" : "Double-cliquez pour agrandir.","frmShareCaption" : "Share","frmShareLabel" : "Share","frmShareInfo" : "You can easily share this publication to social networks.Just cilck the appropriate button below.","frminsertLabel" : "Insert to Site","frminsertInfo" : "Use the code below to embed this publication to your website.","btnQRCode" : "Click to scan QR code","btnRotateLeft" : "Rotate Left","btnRotateRight" : "Rotate Right","lblSelectMode" : "Select view mode please.","frmDownloadPreview" : "Preview","frmHowToUse" : "How To Use","lblHelpPage1" : "Move your finger to flip the book page.","lblHelpPage2" : "Zoom in by using gesture or double click on the page.","lblHelpPage3" : "Click on the logo to reach the official website of the company.","lblHelpPage4" : "Add bookmarks, use search function and auto flip the book.","lblHelpPage5" : "Switch horizontal and vertical view on mobile devices.","TTActionQuiz_PlayAgain" : "Do you wanna play it again","TTActionQuiz_Ration" : "Your ratio is","frmTelephone" : "Telephone list","btnDialing" : "Dialing","lblSelectMessage" : "Please copy the the text content in the text box","btnSelectText" : "Select Text","btnNote" : "Annotation","btnPhoneNumber" : "Telephone"}];var pageEditor =[]
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