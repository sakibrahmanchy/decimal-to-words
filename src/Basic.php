<?php namespace SakibRahaman\DecimalToWords;

class Basic implements DecimalToWordsInterface
{
    private $one = ['','One','Two','Three','Four', 'Five','Six','Seven','Eight','Nine',
                    'Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen',
                    'Seventeen','Eighteen','Nineteen'];
    private $ten = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];
    private $denotes = ['Crore','Lakh','Thousand','Hundred','',''];

    public function convert($number, $currency_whole = '', $currency_decimal = '',
                            $case = null, $decimal_denominator = 'Point',
                            $ending_denominator = null) {
        if($number == 0.0)  return $case ?
                call_user_func($this->resolveCallable($case),"Zero $ending_denominator")
                : "Zero $ending_denominator";
        $number = number_format((float)$number, 2, '.', '');
        $decimals = null;
        $numberToStr = $number."";
        if(strpos($numberToStr,".") !== false) {
            $decimals =(int) (explode(".",$numberToStr)[1]);
            $number =(int) (explode(".",$numberToStr)[0]);
        }
        $str = $this->getWords($number);
        $str .= $currency_whole." ";
        $str .= $decimals ? "$decimal_denominator ".$this->getWords($decimals)."$currency_decimal " : "";
        $str .= $ending_denominator;
        return $case ? call_user_func($this->resolveCallable($case),$str) : $str;
    }

    private function resolveCallable($case)
    {
        if(!in_array($case, ['upper', 'lower']))
            throw new \Exception('Invalid case. Must be either upper or lower.');
        return "strto$case";
    }

    private function getWords($number)
    {
        if (strlen((string) $number) > 9) return 'overflow';
        $substr = substr('000000000' . (int) $number,-9);
        preg_match_all('/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/m', $substr, $parsedTokens);
        $parsedTokens = array_map(function ($item){
            return $item[0];
        },$parsedTokens);
        if (!$parsedTokens) return '';
        $str = $this->parseWord($parsedTokens);
        return $str;
    }

    private function parseWord($parsedTokens) {
        if (!$parsedTokens) return '';
        $str = '';
        for ($i = 1 ; $i <= count($parsedTokens); $i++) {
            $str .= $this->parseIndividual($parsedTokens, $i);
        }
        return $str;
    }

    private function parseIndividual($rows,$i) {
        if(isset($rows[$i]) && $rows[$i] !==0) {
            $number = (int) $rows[$i];
            if ($number > 19) {
                return $this->ten[$rows[$i][0]]." ".$this->one[$rows[$i][1]]." ".$this->denotes[$i-1].(in_array($i,[5]) ? "" : " ");
            } else if($number > 0) {
                return $this->one[$number]." ".$this->denotes[$i-1].(in_array($i,[5]) ? "" : " ");
            } else {
                return "";
            }
        }
        return "";
    }
}