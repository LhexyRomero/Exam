var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    sApiUrl: '/indexApi.php',
    aResponse: {},
    aDivisible: {},
    sEmployee: '',
    sOrganization: 'Health Care Inc.',
    sHours: '8'
  },
  mounted () {
    this.getTimeRecord();
    this.getDivisibleNumber();
  },
  methods : {
    insertTimeRecord () {
      var oSelf = this;

      if (oSelf.sEmployee === '' || oSelf.sOrganization === '' || oSelf.sHours === '') {
        alert('Fill up the fields!')
        return;
      }

      var oData = {
        'sRequest'  : 'insertTimeRecord',
        'oParam'    : {
            'sEmployee'     : oSelf.sEmployee,
            'sOrganization' : oSelf.sOrganization,
            'sHours'        : oSelf.sHours
        }
      }

      $.ajax({
        type : 'POST',
        url  : oSelf.sApiUrl,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data : oData,
        success : function(response) {
          var aResponse = JSON.parse(response);
          oSelf.getTimeRecord();
        }
      });
    },
    getTimeRecord () {
      var oSelf = this;
      var oData = {
        'sRequest'  : 'getTimeRecord',
      }

      $.ajax({
        type : 'POST',
        url  : oSelf.sApiUrl,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data : oData,
        success : function(response) {
          var aResponse = JSON.parse(response);
          oSelf.aResponse = aResponse;
        }
      });
    },
    getDivisibleNumber(){
      var oSelf = this;
      var oData = {
        'sRequest'  : 'getDivisibleNumber',
      }

      $.ajax({
        type : 'POST',
        url  : oSelf.sApiUrl,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data : oData,
        success : function(response) {
          var aResponse = JSON.parse(response);
          oSelf.aDivisible = aResponse;
        }
      });
    }
  }
})
