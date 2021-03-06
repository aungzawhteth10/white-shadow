<?php
$app->get("/", function ($request, $response) {
   return $this->view->render($response, "index.twig");
});
$app->get("/detail", function ($request, $response) {
  	return $this->view->render($response, "detail.twig");
});
$app->get("/control_room", function ($request, $response) {
  	return $this->view->render($response, "control_room.twig");
});
$app->get("/control_division_add", function ($request, $response) {
  	return $this->view->render($response, "division_add.twig");
});
$app->get("/control_detail_add", function ($request, $response) {
  	return $this->view->render($response, "detail_add.twig");
});
$app->get("/control_detail_add_choice", function ($request, $response) {
  	return $this->view->render($response, "detail_add_choice.twig");
});
$app->get("/auth", function ($request, $response) {
  	return $this->view->render($response, "auth.twig");
});
$app->get("/quantityLoad", "ApiDetail:quantityLoad");
$app->get("/divisionList", "ApiDetail:getDivisionList");
$app->post("/division_add", "ApiControlRoom:registerDivision");
$app->post("/detail_add", "ApiControlRoom:registerDetail");
?>