
 <?php 
    $yesterday  = date('l j-F', mktime(0, 0, 0, date("m") , date("d")-1, date("Y")));
    $xxx  = date('l j-F', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
?>
<div class="wcc-full wcc-mt-2">
  <div style="text-align: right">
    <p>Powered By <a href="https://www.virtualbrix.com" style="color: #17a2ea; font-weight: 700" title="Go to VirtualBrix's Website" target="_blank">VirtualBrix</a></p>
  </div>
  <div class="wcc-main-title">
    <h3 class="box-title">Google Analytics Dashboard</h3>
  </div>
</div>
<div class="box-body">
  <div class="wcc_row wcc-half">
      <div class="wcc-filter-top">
        <div id="view-selector-container"></div>
      </div>
  </div>
  <div class="wcc_row wcc-half wcc-date-filter">
    <table>
      <tr>
        <td><label>Date</label></td>
        <td><input type="text" class="form-control date_range_picker" name="filter_date" value="" autocomplete="off"></td>
      </tr>
      <tr>
        <td><label>Selected Date</label></td>
        <td><h4 id="from-dates">Weekly ( <?php echo esc_html($xxx . ' s/d ' . $yesterday); ?> )</h4></td>
      </tr>
    </table>
  </div>
  <div class="vb_clear_both"></div>
  <div class="wcc_row wcc-dashboard-main">
    <div class="tab">
      <div class="wcc-dashboard-left">
        <button title="Page" type="button" class="tablinks wcc-btn-tab" data-tab="page_tab" onclick="openTab(event, 'page_tab')" id="defaultOpen"><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/page.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/page-h.svg', __FILE__ )) ?>"> Page</button>
        <button title="Session" type="button" class="tablinks wcc-btn-tab" data-tab="session_tab" onclick="openTab(event, 'session_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/laptop.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/laptop-h.svg', __FILE__ )) ?>"> Session</button>
        <button title="System" type="button" class="tablinks wcc-btn-tab" data-tab="system_tab" onclick="openTab(event, 'system_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/www.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/www-h.svg', __FILE__ )) ?>"> System</button>
        <button title="Device" type="button" class="tablinks wcc-btn-tab" data-tab="device_tab" onclick="openTab(event, 'device_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/responsive.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/responsive-h.svg', __FILE__ )) ?>"> Device</button>
        <button title="Location" type="button" class="tablinks wcc-btn-tab" data-tab="location_tab" onclick="openTab(event, 'location_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/placeholder.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/placeholder-h.svg', __FILE__ )) ?>"> Location</button>
        <button title="Bounce Rate" type="button" class="tablinks wcc-btn-tab" data-tab="bounce_tab" onclick="openTab(event, 'bounce_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/bounce.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/bounce-h.svg', __FILE__ )) ?>"> Bounce Rate</button>
        <button title="Hits" type="button" class="tablinks wcc-btn-tab" data-tab="hits_tab" onclick="openTab(event, 'hits_tab')" ><img class="vb_na_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/dart-hitting-board-target.svg', __FILE__ )) ?>"><img class="vb_a_img" src="<?php echo esc_url(plugins_url( '../img/menu_img/dart-hitting-board-target-h.svg', __FILE__ )) ?>"> Hits</button>
      </div>
    </div>
    <div id="session_tab" class="tabcontent defaultOpen">
      <div class="wcc-dashboard-char-box">
        <h3 class="wcc-dashboard-char-box-title">Sessions</h3>
        <small class="wcc-mb-10">Counts the total number of sessions.</small>
        <div id="chart-container" class="wcc-dashboard-box-chart"></div>
      </div>
    </div>
    <div id="page_tab" class="tabcontent">
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Pages</h3>
          <small  class="wcc-mb-10">Counts the total number of pageviews.</small>
          <div id="chart-pageviews-container" class="wcc-dashboard-box-chart"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Pages Title</h3>
          <small  class="wcc-mb-10">Counts the total number of pageviews.</small>
          <div id="chart-pageviews-table-container" class="wcc-dashboard-box-chart"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Pages URL</h3>
          <small  class="wcc-mb-10">Counts the total number of pageviews.</small>
          <div id="chart-pageviews2-table-container" class="wcc-dashboard-box-chart"></div>
      </div>
    </div>
    <div id="system_tab" class="tabcontent">
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Browsers Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-browser-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Browsers Count</h3>
          <div class="wcc-dashboard-box-chart" id="chart-browser-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">OS Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-os-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">OS Count</h3>
          <div class="wcc-dashboard-box-chart" id="chart-os-container"></div>
      </div>
    </div>
    <div id="device_tab" class="tabcontent">
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Device Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-device-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Device Count</h3>
          <div class="wcc-dashboard-box-chart" id="chart-device-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Mobile Brand Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-mobileDeviceBranding-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Mobile Brand Count</h3>
          <div class="wcc-dashboard-box-chart" id="chart-mobileDeviceBranding-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Screen Resolution Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-screenResolution-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Screen Resolution Count</h3>
          <div class="wcc-dashboard-box-chart" id="chart-screenResolution-container"></div>
      </div>
    </div>
    <div id="location_tab" class="tabcontent">
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Country Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-country-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Country Count</h3>
          <div class="wcc-dashboard-box-chart table-half" id="chart-country-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Region Count</h3>
          <div class="wcc-dashboard-box-chart table-half" id="chart-region-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">City Count</h3>
          <div class="wcc-dashboard-box-chart table-half" id="chart-city-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Metro Count</h3>
          <div class="wcc-dashboard-box-chart table-half" id="chart-metro-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Language Chart</h3>
          <div class="wcc-dashboard-box-chart" id="chart-language-chart-container"></div>
      </div>
      <div class="width100">  
          <h3 class="wcc-dashboard-char-box-title">Language Count</h3>
          <div class="wcc-dashboard-box-chart table-half" id="chart-language-container"></div>
      </div>
    </div>
    <div id="bounce_tab" class="tabcontent">
      <div class="width100">
          <h3 class="wcc-dashboard-char-box-title">Bounce Rate</h3>
          <small>The percentage of single-page session (i.e., session in which the person left your property from the first page)</small>
          <div class="wcc-dashboard-box-chart" id="chart-bounce-container"></div>
      </div>
    </div>
    <div id="hits_tab" class="tabcontent">
      <div class="width100">
          <h3 class="wcc-dashboard-char-box-title">Hits</h3>
          <small>otal number of hits sent to Google Analytics. This metric sums all hit types (e.g. pageview, event, timing, etc.).</small>
          <div class="wcc-dashboard-box-chart" id="chart-hits-container"></div>
      </div>
    </div>
    <div class="vb_clear_both"></div>
  </div>
</div>

<script>
(function(w, d, s, g, js, fs) {
    g = w.gapi || (w.gapi = {});
    g.analytics = {
        q: [],
        ready: function(f) {
            this.q.push(f);
        }
    };
    js = d.createElement(s);
    fs = d.getElementsByTagName(s)[0];
    js.src = 'https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js, fs);
    js.onload = function() {
        g.load('analytics');
    };
}(window, document, 'script'));
</script>

<script>
var viewSelector = [];
gapi.analytics.ready(function() {

    /**
     * Authorize the user immediately if the user has already granted access.
     * If no access has been created, render an authorize button inside the
     * element with the ID "embed-api-auth-container".
     */
    gapi.analytics.auth.authorize({
      'serverAuth': {
        'access_token': '<?php echo esc_attr($google_analytics_access_token) ?>'
      }
      /*container: 'embed-api-auth-container',
      clientid: '769385899948-e666lcpmo3iqgap22j3sel1ontcakrn3.apps.googleusercontent.com',*/
    });


    /**
     * Create a new ViewSelector instance to be rendered inside of an
     * element with the id "view-selector-container".
     */
    viewSelector = new gapi.analytics.ViewSelector({
        container: 'view-selector-container'
    });

    // Render the view selector to the page.
   

    /**
     * Create a new DataChart instance with the given query parameters
     * and Google chart options. It will be rendered inside an element
     * with the id "chart-container".
     */
    var dataChart = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:visits',
            dimensions: 'ga:day',
            'start-date': '7daysAgo',
            'end-date': 'yesterday'
        },
        chart: {
            container: 'chart-container',
            type: 'LINE',
            options: {
                width: '100%'
            }
        }
    });


    /**
     * Create a new DataChart instance for pageviews over the 7 days prior
     * to the past 7 days.
     * It will be rendered inside an element with the id "chart-2-container".
     */
    var dataChartPageviews = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:pageviews',
            dimensions: 'ga:day',
            'start-date': '7daysAgo',
            'end-date': 'yesterday'
        },
        chart: {
            container: 'chart-pageviews-container',
            type: 'COLUMN',
            options: {
                width: '100%'
            }
        }
    });

    var dataChartPageviewsTbl = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:pageviews',
          'dimensions': 'ga:pageTitle',
          'sort': '-ga:pageviews',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-pageviews-table-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartPageviewsTbl2 = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:pageviews',
          'dimensions': 'ga:pagePath',
          'sort': '-ga:pageviews',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-pageviews2-table-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartBrowser = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:browser',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-browser-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartBrowserChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:browser',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-browser-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartlanguage = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:language',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-language-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartlanguageChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:language',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-language-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartos = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:operatingSystem',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-os-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartosChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:operatingSystem',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-os-chart-container',
          options: {
            width: '100%'
          }
        }
    });


    var dataChartdevice = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:deviceCategory',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-device-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartdeviceChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:deviceCategory',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-device-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartmobileDeviceBranding = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:mobileDeviceBranding',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-mobileDeviceBranding-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartmobileDeviceBrandingChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:mobileDeviceBranding',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-mobileDeviceBranding-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartscreenResolution = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:screenResolution',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-screenResolution-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartscreenResolutionChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:screenResolution',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'COLUMN',
          container: 'chart-screenResolution-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartregion = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:region',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-region-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartcity = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:city',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-city-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartmetro = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:metro',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-metro-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartcountry = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:country',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'TABLE',
          container: 'chart-country-container',
          options: {
            width: '100%'
          }
        }
    });

    var dataChartcountryChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          'metrics': 'ga:sessions',
          'dimensions': 'ga:country',
          'sort': '-ga:sessions',
        },
        chart: {
          type: 'GEO',
          container: 'chart-country-chart-container',
          options: {
            width: '100%'
          }
        }
    });

    /**
     * Create a new DataChart instance for pageviews over the past 7 days.
     * It will be rendered inside an element with the id "chart-1-container".
     */
    var dataChart1 = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:bounceRate',
            dimensions: 'ga:day',
            'start-date': '7daysAgo',
            'end-date': 'yesterday'
        },
        chart: {
            container: 'chart-bounce-container',
            type: 'COLUMN',
            options: {
                width: '100%'
            }
        }
    });


    /**
     * Create a new DataChart instance for pageviews over the 7 days prior
     * to the past 7 days.
     * It will be rendered inside an element with the id "chart-2-container".
     */
    var dataChart2 = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:hits',
            dimensions: 'ga:day',
            'start-date': '7daysAgo',
            'end-date': 'yesterday'
        },
        chart: {
            container: 'chart-hits-container',
            type: 'COLUMN',
            options: {
                width: '100%'
            }
        }
    });
     viewSelector.execute();


    /**
     * Render both dataCharts on the page whenever a new view is selected.
     */
    var exceuteRecusive = function(object,ids){
      object.set({
            query: {
                ids: ids
            }
        }).on('error', function(response) {
          setTimeout(function(){ exceuteRecusive(object,ids); }, 500);
        }).execute();
    };
    var exceuteDataRecusive = function(object,data){
      object.set({
            query: data
        }).on('error', function(response) {
          setTimeout(function(){ exceuteDataRecusive(object,ids); }, 500);
        }).execute();
    };
    var viewSelector_id = "";
    viewSelector.on('change', function(ids) {
        viewSelector_id = ids;
       
            exceuteRecusive(dataChartPageviews,viewSelector_id);
            exceuteRecusive(dataChartPageviewsTbl,viewSelector_id);
            exceuteRecusive(dataChartPageviewsTbl2,viewSelector_id);
    

        jQuery('.date_range_picker').daterangepicker({autoUpdateInput: false, locale: { format: 'YYYY-MM-DD' }});

        jQuery('.date_range_picker').on('apply.daterangepicker', function(ev, picker) {
          jQuery(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
          data = {
            'start-date': picker.startDate.format('YYYY-MM-DD'),
            'end-date': picker.endDate.format('YYYY-MM-DD')
          };

          exceuteDataRecusive(dataChart,data);
          exceuteDataRecusive(dataChartPageviews,data);
          exceuteDataRecusive(dataChartPageviewsTbl,data);
          exceuteDataRecusive(dataChartPageviewsTbl2,data);
          exceuteDataRecusive(dataChart1,data);
          exceuteDataRecusive(dataChart2,data);
          exceuteDataRecusive(dataChartBrowser,data);
          exceuteDataRecusive(dataChartBrowserChart,data);
          exceuteDataRecusive(dataChartlanguage,data);
          exceuteDataRecusive(dataChartlanguageChart,data);
          exceuteDataRecusive(dataChartos,data);
          exceuteDataRecusive(dataChartosChart,data);
          exceuteDataRecusive(dataChartdevice,data);
          exceuteDataRecusive(dataChartdeviceChart,data);
          exceuteDataRecusive(dataChartmobileDeviceBranding,data);
          exceuteDataRecusive(dataChartmobileDeviceBrandingChart,data);
          exceuteDataRecusive(dataChartscreenResolution,data);
          exceuteDataRecusive(dataChartscreenResolutionChart,data);
          exceuteDataRecusive(dataChartregion,data);
          exceuteDataRecusive(dataChartcity,data);
          exceuteDataRecusive(dataChartmetro,data);
          exceuteDataRecusive(dataChartcountry,data);
          exceuteDataRecusive(dataChartcountryChart,data);
         

          // Update the "from" dates text.
          var datefield = document.getElementById('from-dates');
          datefield.textContent = data['start-date'] + '&mdash;' + data['end-date'];
        });

        jQuery('.date_range_picker').on('cancel.daterangepicker', function(ev, picker) {
          jQuery(this).val('');
        });
        var session_tab = "";
        var page_tab = "";
        var system_tab = "";
        var device_tab = "";
        var location_tab = "";
        var bounce_tab = "";
        var hits_tab = "";

        
        
       
       

        jQuery(".tablinks").click(function(){
          if(jQuery(this).data("tab") == "session_tab" && session_tab == ""){
            exceuteRecusive(dataChart,viewSelector_id);
            session_tab = 1;
          }else if(jQuery(this).data("tab") == "page_tab" && page_tab == ""){
            /*exceuteRecusive(dataChartPageviews,viewSelector_id);
            exceuteRecusive(dataChartPageviewsTbl,viewSelector_id);
            exceuteRecusive(dataChartPageviewsTbl2,viewSelector_id);*/
            page_tab = 1;
          }else if(jQuery(this).data("tab") == "system_tab" && system_tab == ""){
             exceuteRecusive(dataChartBrowser,viewSelector_id);
            exceuteRecusive(dataChartBrowserChart,viewSelector_id);
            exceuteRecusive(dataChartos,viewSelector_id);
            exceuteRecusive(dataChartosChart,viewSelector_id);
            system_tab = 1;
          }else if(jQuery(this).data("tab") == "device_tab" && device_tab == ""){
            exceuteRecusive(dataChartdevice,viewSelector_id);
            exceuteRecusive(dataChartdeviceChart,viewSelector_id);
            exceuteRecusive(dataChartmobileDeviceBranding,viewSelector_id);
            exceuteRecusive(dataChartmobileDeviceBrandingChart,viewSelector_id);
            exceuteRecusive(dataChartscreenResolution,viewSelector_id);
            exceuteRecusive(dataChartscreenResolutionChart,viewSelector_id);
            device_tab = 1;
          }else if(jQuery(this).data("tab") == "location_tab" && location_tab == ""){
            exceuteRecusive(dataChartregion,viewSelector_id);
            exceuteRecusive(dataChartcity,viewSelector_id);
            exceuteRecusive(dataChartmetro,viewSelector_id);
            exceuteRecusive(dataChartcountry,viewSelector_id);
            exceuteRecusive(dataChartcountryChart,viewSelector_id);
            exceuteRecusive(dataChartlanguage,viewSelector_id);
            exceuteRecusive(dataChartlanguageChart,viewSelector_id);
            location_tab = 1;
          }else if(jQuery(this).data("tab") == "bounce_tab" && bounce_tab == ""){
            exceuteRecusive(dataChart1,viewSelector_id);
            bounce_tab = 1;
          }else if(jQuery(this).data("tab") == "hits_tab" && hits_tab == ""){
            exceuteRecusive(dataChart2,viewSelector_id);
            hits_tab = 1;
          }
        })
    });

});
</script>

<script>
function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>