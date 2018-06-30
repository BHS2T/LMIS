<?php

include '../Model/Sample.php';

class SampleController extends Sample {

    public function addSample($sampleInfo) {
        $sample = new Sample();

        $sample->setSamplename($sampleInfo['samplename']);
        $sample->setTime($sampleInfo['testtime']);
        $sample->setAmount($sampleInfo['amount']);
        $sample->setParameter($sampleInfo['parameter']);
        $sample->setSampletype($sampleInfo['sampletype']);

        $sample_result = array();
        $sample_result['samplename'] = $sample->getSamplename();
        $sample_result['testtime'] = $sample->getTime();
        $sample_result['parameter'] = $sample->getParameter();
        $sample_result['amount'] = $sample->getAmount();
        $sample_result['sampletype'] = $sample->getSampleType();

        $re = $sample->insertSample($sample_result);
    }

    public function viewSample() {
        $sample = new Sample();
        $all_sample = $sample->getAllSample();

        return $all_sample;
    }

    public function viewParameter($samplenameT) {
        $sample = new Sample();
        $all_params = new $sample->findParameter($samplenameT);
        return $all_params;
    }

    public function getParameters($samplename) {
        $sampleTest = new SampleToTest();
        $all_params = $sampleTest->findParam($samplename);
        return $all_params;
    }

    public function removeSample($id) {
        $sample = new Sample();
//        $sample->deleteSample($id);
    }

}
