
// Provide a default path to dwr.engine
if (dwr == null) var dwr = {};
if (dwr.engine == null) dwr.engine = {};
if (DWREngine == null) var DWREngine = dwr.engine;

if (DlaService == null) var DlaService = {};
DlaService._path = '/dwr';
DlaService.updateEbookXml = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'updateEbookXml', p0, callback);
}
DlaService.listOrgByAmphur = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'listOrgByAmphur', p0, callback);
}
DlaService.listAmphurByProvince = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'listAmphurByProvince', p0, callback);
}
DlaService.listDistrictByAmphur = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'listDistrictByAmphur', p0, callback);
}
DlaService.listProvinceByRegion = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'listProvinceByRegion', p0, callback);
}
DlaService.getListLandmarkImage = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getListLandmarkImage', callback);
}
DlaService.listProvinceIdByRegion = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'listProvinceIdByRegion', p0, callback);
}
DlaService.getInfo03Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo03Data', p0, callback);
}
DlaService.getInfo04Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo04Data', p0, callback);
}
DlaService.getInfo05Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo05Data', p0, callback);
}
DlaService.getInfo06Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo06Data', p0, callback);
}
DlaService.getInfo07Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo07Data', p0, callback);
}
DlaService.getInfo08Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo08Data', p0, callback);
}
DlaService.getInfoChartDataCandidate1 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataCandidate1', callback);
}
DlaService.getDistrictInfo = function(p0, p1, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getDistrictInfo', p0, p1, callback);
}
DlaService.getProvinceSurveyElection = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getProvinceSurveyElection', p0, callback);
}
DlaService.getInfoChartDataVoter2 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataVoter2', callback);
}
DlaService.getInfoChartDataPollingplace3 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataPollingplace3', callback);
}
DlaService.getInfoChartDataNewsdistribution4 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataNewsdistribution4', callback);
}
DlaService.getInfoChartDataElectionStaff5 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataElectionStaff5', callback);
}
DlaService.getInfoChartDataElectionMaterial6 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataElectionMaterial6', callback);
}
DlaService.getInfoChartDataPreparing7 = function(callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfoChartDataPreparing7', callback);
}
DlaService.getLatLongOrgLocation = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getLatLongOrgLocation', p0, callback);
}
DlaService.getLatLongAmphurLocation = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getLatLongAmphurLocation', p0, callback);
}
DlaService.getLatLongProvinceLocation = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getLatLongProvinceLocation', p0, callback);
}
DlaService.getInfo01Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo01Data', p0, callback);
}
DlaService.getInfo02Data = function(p0, callback) {
  dwr.engine._execute(DlaService._path, 'DlaService', 'getInfo02Data', p0, callback);
}
