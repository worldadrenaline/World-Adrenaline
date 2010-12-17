<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'username' => array('notempty'),
		'password' => array('notempty'),
		'group_id' => array('numeric')
	);

	var $belongsTo = array('Group');
	var $actsAs = array('Acl' => 'requester');
	 
	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    $data = $this->data;
	    if (empty($this->data)) {
	        $data = $this->read();
	    }
	    if (!$data['User']['group_id']) {
	        return null;
	    } else {
	        return array('Group' => array('id' => $data['User']['group_id']));
	    }
	}

	/**    
	 * After save callback
	 *
	 * Update the aro for the user.
	 *
	 * @access public
	 * @return void
	 */
	function afterSave($created) {
	        if (!$created) {
	            $parent = $this->parentNode();
	            $parent = $this->node($parent);
	            $node = $this->node();
	            $aro = $node[0];
	            $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
	            $this->Aro->save($aro);
	        }
	}


}
?>