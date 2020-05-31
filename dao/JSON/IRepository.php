<?php namespace dao\JSON;

interface IRepository {

    function add($value);
    function getAll();
    function delete($value);

}