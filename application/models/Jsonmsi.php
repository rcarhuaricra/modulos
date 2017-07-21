<?php

class Jsonmsi extends CI_Model {

    public function Convocatoriascas($all) {
        $sql = "SELECT 
                codigo 
                , descripcion
                , area_solicitante
                , convocatoria
                , fecha_limite
                , resultado_curricular
                , otras_evaluaciones
                , publicacion_final
                ,comunicados
                ,observaciones
                FROM `wp_wpdatatable_8`";
        if ($all == 'all') {
            $sql.='';
        }if ($all == '') {
            $sql .= " WHERE
                resultado_curricular = ''
                AND codigo <>''
                AND comunicados = '' 
                AND tipo_de_proceso='electronico'";
        }if ($all == 'electronico') {
            $sql .= " WHERE
                 tipo_de_proceso='electronico'";
        }
        $sql .=" ORDER BY CODIGO DESC";


        return $this->db->query($sql);
    }

    public function convocatoriasCasdetalle2($all) {

        $sql = "SELECT 
                codigo 
                , descripcion
                , area_solicitante
                , convocatoria
                , fecha_limite
                , resultado_curricular
                , otras_evaluaciones
                , publicacion_final
                ,comunicados
                ,observaciones
                ,tipo_de_proceso
                FROM `wp_wpdatatable_8`";
        if ($all == 'all') {
            $sql.='';
        }if ($all == '') {
            $sql .= " WHERE
                resultado_curricular = ''
                AND codigo <>''
                AND comunicados = '' 
                AND tipo_de_proceso='electronico'";
        }if ($all == 'electronico') {
            $sql .= " WHERE
                 tipo_de_proceso='electronico'";
        }
        $sql .=" ORDER BY CODIGO DESC";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function convocatoriasCasdetalle($cas) {
        $sql = "SELECT 
                codigo 
                , descripcion
                , area_solicitante
                , convocatoria
                
                , resultado_curricular
                , otras_evaluaciones
                , publicacion_final
                ,comunicados
                ,observaciones
                FROM `wp_wpdatatable_8`
                WHERE
                 codigo='$cas'";

        $sql .=" ORDER BY CODIGO DESC";
        $result = $this->db->query($sql);

        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function NoticiasWeb() {

        $sql = "SELECT
p1.ID
, DATE_FORMAT(p1.post_date, '%Y-%m-%d') post_date
, p1.post_status
, p1.menu_order
, p1.post_type
, p1.post_title
, p1.post_content
, p2.guid
FROM `wp_posts` p1
LEFT JOIN `wp_posts` p2 ON p2.post_parent = p1.ID
AND (p2.post_mime_type = 'image/png' OR p2.post_mime_type = 'image/jpeg')
WHERE
(p1.post_status = 'publish' OR p1.post_status = 'attachment' )
AND p1.post_type = 'post' AND p2.guid<>'(null)'
GROUP BY p1.ID
ORDER BY p1.post_date DESC
LIMIT 20";

        return $this->db->query($sql);
    }

    public function EventosWeb() {

        $sql = "SELECT
E.post_id, DATE_FORMAT(E.`event_start_date`, '%d-%m') as event_start_date
, DATE_FORMAT(E.`event_end_date`, '%d-%m') as event_end_date
, MAX(P.`post_modified_gmt`)
, E.`event_id`
, P.`guid`
, E.`event_name`
, DATE_FORMAT(E.`event_start_time`, '%h:%i %p') as event_start_time
, DATE_FORMAT(E.`event_end_time`, '%h:%i %p') as event_end_time
, E.`post_content`
, E.location_id
, (SELECT L.LOCATION_NAME FROM `wp_em_locations` L WHERE E.`location_id` = L.location_id) as LUGAR
, (SELECT L.LOCATION_address FROM `wp_em_locations` L WHERE E.`location_id` = L.location_id) as DIRECCION
, (SELECT L.LOCATION_STATE FROM `wp_em_locations` L WHERE E.`location_id` = L.location_id) as DISTRITO
, (SELECT L.LOCATION_TOWN FROM `wp_em_locations` L WHERE E.`location_id` = L.location_id) as PROVINCIA
FROM `wp_em_events` E
INNER JOIN `wp_postmeta` P1
INNER JOIN `wp_posts` P
ON (E.post_id = P.post_parent OR E.`post_id` = P1.post_id )
AND (P.post_mime_type = 'image/png' OR P.post_mime_type = 'image/jpeg')
WHERE
P1.meta_value = P.`ID`
AND P.`post_parent`<>'0'
AND E.`event_status` = '1'
AND E.`event_end_date`>= CURDATE()
GROUP BY E.`event_id`
ORDER BY E.`event_start_date` ASC
limit 10";

        return $this->db->query($sql);
    }

}
