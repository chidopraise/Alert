package www.alert.alert;
import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.net.http.SslError;
import android.os.Bundle;
import android.webkit.SslErrorHandler;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.view.View;
import android.webkit.WebSettings.PluginState;



public class MainActivity extends Activity {

    // variables para manejar la subida de archivos
    private final static int FILECHOOSER_RESULTCODE = 1;
    private ValueCallback<Uri[]> mUploadMessage;

    // variable para manejar el navegador empotrado
    WebView mainWebView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);


        // instanciamos el webview
        mainWebView = findViewById(R.id.webView);

        // establecemos el cliente interno para que la navegacion no se salga de la aplicacion
        //mainWebView.setWebViewClient(new MyWebViewClient());
        WebViewClient webViewClient = new MyWebViewClient(this);
        mainWebView.setWebViewClient(webViewClient);

		mainWebView.setBackgroundColor(0); // This sets the WebView's background to be transparent
        // establecemos el cliente chrome para seleccionar archivos
        mainWebView.setWebChromeClient(new MyWebChromeClient());

        // configuracion del webview


        mainWebView.getSettings().setJavaScriptEnabled(true);
        mainWebView.getSettings().setSupportZoom(true);
        mainWebView.getSettings().setBuiltInZoomControls(true);
        mainWebView.getSettings().setPluginState(PluginState.ON);
        mainWebView.getSettings().setSupportMultipleWindows(true);


        //mainWebView.getSettings().setJavaScriptEnabled(true);
        //mainWebView.getSettings().setLoadsImagesAutomatically(true);
        //mainWebView.getSettings().setSupportMultipleWindows(true);


        // cargamos la pagina
        mainWebView.loadUrl("https://alert.abrahamlivinus.tech/");

        String unencodedHtml =
                "&lt;html&gt;&lt;body&gt;'%23' is the percent code for ‘#‘ &lt;/body&gt;&lt;/html&gt;";


    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent intent) {

        // manejo de seleccion de archivo
        if (requestCode == FILECHOOSER_RESULTCODE) {

            if (null == mUploadMessage || intent == null || resultCode != RESULT_OK) {
                return;
            }

            Uri[] result = null;
            String dataString = intent.getDataString();

            if (dataString != null) {
                result = new Uri[]{Uri.parse(dataString)};
            }

            mUploadMessage.onReceiveValue(result);
            mUploadMessage = null;
        }
    }


    // ====================
    // Web clients classes
    // ====================

    /**
     * Clase para configurar el webview
     */
    private class MyWebViewClient extends WebViewClient {

        private Activity activity = null;

        public MyWebViewClient(Activity activity) {
            this.activity = activity;
        }


        @Override
        public boolean shouldOverrideUrlLoading(WebView webView, String url) {
            if(url.indexOf("asbesoc-vpad.org/images/asbesoc/") > -1 ) return false;

            Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
            activity.startActivity(intent);
            return true;
        }

    }


    /**
     * Clase para configurar el chrome client para que nos permita seleccionar archivos
     */
    private class MyWebChromeClient extends WebChromeClient {

        // maneja la accion de seleccionar archivos
        @Override
        public boolean onShowFileChooser(WebView webView, ValueCallback<Uri[]> filePathCallback, FileChooserParams fileChooserParams) {

            // asegurar que no existan callbacks
            if (mUploadMessage != null) {
                mUploadMessage.onReceiveValue(null);
            }

            mUploadMessage = filePathCallback;

            Intent i = new Intent(Intent.ACTION_GET_CONTENT);
            i.addCategory(Intent.CATEGORY_OPENABLE);
            i.setType("*/*"); // set MIME type to filter

            MainActivity.this.startActivityForResult(Intent.createChooser(i, "File Chooser"), MainActivity.FILECHOOSER_RESULTCODE);

            return true;
        }
    }


    //if you are on a different page then backbutton won'finish the app with this code
    @Override
    public void onBackPressed() {
        if (mainWebView.canGoBack()) {
            mainWebView.goBack();
        } else {
            super.onBackPressed();
        }
    }
}